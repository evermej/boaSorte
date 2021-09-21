<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buyer;
use App\Models\Number;
use App\Http\Requests\SaleRequest;
use App\Models\Winner;
use Illuminate\Support\Facades\Route;
// use App\Rules\NumberRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\cpfRule;
use App\Rules\phoneRule;
use App\Rules\NumberRule;
use App\Rules\NameRule;


class HomeController extends Controller
{
    
    public function index()
    {
        $progress = Number::count();
        $porcentaje = $progress / 5;

        return view('bs.index', compact('porcentaje'));
        
    }

    public function toBuy()
    {
        $seller = auth()->user();
        return view('bs.to_buy',  compact('seller'));
    }

    public function bought(Request $request)
    {   
        if (Number::where('number', $request->number)->exists()) {
            $purchase['success'] = false;
            $purchase['message'] =  'numero existente';
            return json_encode($purchase);
        }

        $request->validate([
            'number' => ['required','unique:numbers', 'numeric', 'min:0', 'max:9999', new NumberRule()],
            'name' => ['required', new NameRule()],
            'cpf' => ['required','size:14', new cpfRule()],
            'telephone' => ['required','numeric', new phoneRule()]
        ]);

        $buyer = Buyer::updateOrCreate(
            ['name' => $request->name],                                     //si existe
            ['cpf' => $request->cpf, 'telephone' => $request->telephone]    // actualiza
        );                                                                  //de lo contrario crea modelo combinando las matrices


        [$seller] = User::select('id')->where('name', $request->seller)->get(); //vendedor

        Number::create([                                                       //con observer para crear ganador
            'number' => $request->number,
            'buyer_id' => $buyer->id,
            'seller_id' => $seller->id,
            'pago' => $request->pago
        ]);

        $purchase['success'] = true;
        $purchase['message'] =  'Ok.';
        return json_encode($purchase);
        
    }


    public function lastswinners()
    {
        $winners = Winner::all();
        return view('bs.lastswinners', compact('winners'));
    }
}
