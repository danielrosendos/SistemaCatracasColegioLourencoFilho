<?php

namespace App\Http\Controllers;


use App\CadastroGB;
use Illuminate\Http\Request as HttpRequest;
use Request;
use App\Http\Requests\GBRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\contatoEmail;

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

    public function listagem(){

        $listagem = CadastroGB::all();

        return view('gb.listagemGB')->with(['listagem'=> $listagem]);
    }

    public function registrar($id){

        $aluno = CadastroGB::find($id);
        
        if(empty($aluno)){
            return view('gb.registroGB')->with('l', $aluno);
        }

        return view('gb.registroGB')->with('l', $aluno);
    }

    public function adicionar(GBRequest $request, $id){

        if($id==0){
            CadastroGB::create($request->all());
        }else{
            CadastroGB::find($id)->update(Request::except($id));
        }
        return redirect()->action('ControllerGB@registrar', $id = 0)->withInput(Request::only('name'));
    }

    public function suporteGB(){
        return view('email.email_site_gb');
    }

    public function deletar($id){
        $aluno = CadastroGB::find($id);
        $aluno->delete();

        return redirect()->action('ControllerGB@listagem');
    }

    public function pesquisaGB(HttpRequest $request){
        $aux = $request->texto;

        if(empty($aux)){
            return ControllerGB::listagem();
        }

        $listagem = CadastroGB::where('name', 'like', '%'.$aux.'%')
                                            ->orWhere('email', 'like', '%'.$aux.'%')
                                            ->orWhere('curso', 'like', '%'.$aux.'%')
                                            ->get();
       
        return view('gb.listagemGB')->with(['listagem'=> $listagem, 'chavepesquisa'=> $request->texto]);
    }

    public function enviaEmailGB(HttpRequest $request){
        $email = array('site@lourencofilho.com.br');

        Mail::to($email)->cc('site@lourencofilho.com.br')->send(new contatoEmail($request));

        return view('email.sucessGB');
    }
}
