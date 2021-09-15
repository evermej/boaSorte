<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'buyer_id', 'user_id'];
    public $timestamps = true;

    //relacion uno a muchos inversa con user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //relacion uno a muchos inversa con buyer
    public function buyer()
    {
        return $this->belongsTo('App\Models\Buyer');
    }
}
