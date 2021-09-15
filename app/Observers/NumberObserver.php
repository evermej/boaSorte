<?php

namespace App\Observers;

use App\Models\Number;
use App\Models\Winner;

class NumberObserver
{
    
    public function created(Number $number)
    {
        $progress = Number::where('pago','yes')->count();
       
        if ($progress >= 5) {           //cuenta de sorteo

            $aleatorio = Number::find(rand(1,5));      //un id aleatorio
            Winner::create([
                'number' => $aleatorio->number,
                'buyer_id' => $aleatorio->buyer->id,       //relacion Number con Buyer
                'user_id' => $aleatorio->seller->id,    //relacion Number con User para el vendedor
            ]);
            Number::truncate();
            
        }
    }

    
    public function updated(Number $number)
    {
        //
    }

    
    public function deleted(Number $number)
    {
        //
    }

    
    public function restored(Number $number)
    {
        //
    }

    
    public function forceDeleted(Number $number)
    {
        //
    }
}
