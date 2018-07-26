<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    Este controlador lida com o registro de novos usuários, bem como sua validação e criação. 
    Por padrão, este controlador usa uma característica para fornecer essa funcionalidade sem exigir nenhum código adicional.
    |
    */

    use RegistersUsers;

    /**
     * Os usuários são redmencionados para /home depois de serem criados, somente usuários autenticados podem criar outros usuários, no caso o administrador
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Criação da nova instancia do controlador
     *
     * @return void
     */
    public function __construct()
    {
        //Banco de dados Padrão MYSQL
        DB::setDefaultConnection('mysql');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
