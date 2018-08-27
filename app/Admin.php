<?php

/*
Classe de usuário, para a criação ou não de novos usuários.
*/

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $connection = 'mysql';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password','isAdmin',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
