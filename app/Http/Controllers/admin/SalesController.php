<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Number;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function sales()
    {
        $seller = auth()->user();

        $total = Number::select('seller_id')
            ->where('seller_id', $seller->id)->get()->count();

        return view('admin.sales', compact('seller', 'total'));
        // return $total;
    }
}
