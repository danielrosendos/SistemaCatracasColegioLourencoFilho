<?php

namespace App\Http\Controllers;
use App\CadastroGB;
use Request;
use App\Http\Requests\GBRequest;
use Illuminate\Support\Facades\Validator;

class ControllerGB extends Controller
{
    //função construtor, que define somente usuários autenticados possuem acesso.
    public function __construct(){
        $this->middleware('auth');
    }

    //função que leva a página inicial
    public function iniciar(){
        return view('gb.homegb');
    }

    public function registrar(){
        return view('gb.registroGB');
    }

    public function adicionar(GBRequest $request){
        CadastroGB::create($request->all());

        return redirect()->action('ControllerGB@registrar')->withInput(Request::only('nome'));
    }
}
