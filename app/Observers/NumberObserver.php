<?php

namespace App\Observers;

use App\Models\Number;
use App\Models\Winner;

class NumberObserver
{
    
    public function created(Number $number)
    {
        
        $progress = Number::where('pago','yes')->count();
       
        if ($progress >= 6) {                          //cuenta de sorteo

            $nRandom = Number::find(rand(1,6));      //un id aleatorio
            Winner::create([
                'number' => $nRandom->number,
                'buyer_id' => $nRandom->buyer->id,       //relacion Number con Buyer
                'user_id' => $nRandom->seller->id,       //relacion Number con User para el vendedor
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
