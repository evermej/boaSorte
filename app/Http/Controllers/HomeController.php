<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buyer;
use App\Models\Number;
use App\Http\Requests\SaleRequest;
use App\Models\Winner;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    
    public function index()
    {
        $progress = Number::count();
        $porcentaje = $progress / 5;

        return view('bs.index', compact('porcentaje'));
        // return Route::currentRouteName();
    }

    public function toBuy()
    {
        $seller = auth()->user();
        return view('bs.to_buy',  compact('seller'));
    }

    public function bought(SaleRequest $request)
    {
        $buyer = Buyer::updateOrCreate(
            ['name' => $request->name],                                     //si existe
            ['cpf' => $request->cpf, 'telephone' => $request->telephone]    // actualiza
        );                                                                  //de lo contrario crea modelo combinando las matrices


        [$seller] = User::select('id')->where('name', $request->seller)->get();//vendedor

        Number::create([                                                       //con observer para crear ganador
            'number' => $request->number,
            'buyer_id' => $buyer->id,
            'seller_id' => $seller->id,
            'pago' => $request->pago
        ]);

        return redirect()->route('bs.tobuy')->with('message', 'obrigado pela sua compra');
        // return var_dump($request->number);
    
    }


    public function lastswinners()
    {
        $winners = Winner::all();
        return view('bs.lastswinners', compact('winners'));
        // return Route::currentRouteName();
    }
}




// $obPayload = (new Payload)
// ->setPixKey('63195129388')
// ->setDescription('pagamento de compra online')
// ->setMerchantName('ever mejia')
// ->setMerchantCity('fortaleza')
// ->setAmount(100.00)
// ->setTxId('everdevs');

// $payload_Code = $obPayload->getPayload();

// $obQrCode = new QrCode('1033340641');
// $image = (new Output\Png)->output($obQrCode, 400);

// header('Content-Type: image/png');
// echo $image;
// echo $payload_Code;