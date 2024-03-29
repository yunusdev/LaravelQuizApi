<?php

namespace App;

use App\Model\SocialProvider;
use App\Model\Test;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

    public function tests(){

        return $this->hasMany(Test::class);

    }

    public function isAdmin(){

        if ($this->is_admin == 1){

            return true;
        }

        return false;
    }
}
