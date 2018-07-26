<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | 
    | Esse controlador é responsável por tratar os e-mails de redefinição de senha e 
    | inclui um atributo que ajuda a enviar essas notificações do seu aplicativo para os usuários. Sinta-se livre para explorar esse traço.
    | Como não foi programado a o esqueci o password, a senha deve ser modificada diretamenta no banco de dados mysql, na tabela de usuários.
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        DB::setDefaultConnection('mysql');
        $this->middleware('guest');
    }
}
