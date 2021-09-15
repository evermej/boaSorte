<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'buyer_id', 'seller_id', 'pago'];
    
    public function buyer()                         //relacion: uno a muchos inversa con buyer inversa
    {
        return $this->belongsTo('App\Models\Buyer');
    }

    public function seller()                         //relacion: uno a muchos inversa con users inversa(vendedor)
    {
        return $this->belongsTo('App\Models\User');
    }


}
