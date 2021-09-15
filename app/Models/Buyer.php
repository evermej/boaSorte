<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    public $timestamps = true;              //coloca fecha creacion y modificacion
    
    protected $fillable = ['name', 'cpf', 'telephone'];

    
    public function numbers()                       //relacion: uno a muchos con numbers
    {
        return $this->hasMany('App\Models\Number');
    }

    public function won()                       //relacion: uno a muchos con winner
    {
        return $this->hasMany('App\Models\Winner');
    }
}
