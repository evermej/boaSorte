<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public $timestamps = true;

    
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    protected $appends = [
        'profile_photo_url',
    ];
    
    public function setPasswordAttribute($value)            //encryptar la contrasenha
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function numbers()                               //relacion uno amuchos con numbers
    {
        return $this->hasMany('App\Models\Number');
    }

    //relacion uno a muchos con winner
    public function won()
    {
        return $this->hasMany('App\Models\Winner');
    }

}
