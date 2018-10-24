<?php

//Local onde se Encontra o arquivo, sua localização.
namespace App\Http\Controllers;

//Chamada das Classses do Laravel.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;


//Chamada das classes que contém acesso ao banco de dados / tabelas
use App\Catraca;
use App\CatracaBioCadastrada;
use App\CatracaPessSemCartao;
use App\ListaUsuariosCatraca;
use App\Contato;
use App\Mail\contatoEmail;


    /*
    |--------------------------------------------------------------------------
    | CatracaControler
    |--------------------------------------------------------------------------
    | Esse Controler Lida com as requisições da página, listagem e entre outros
    */
 

class CatracaControler extends Controller{

    //função construtor, que define somente usuários autenticados possuem acesso.
    public function __construct(){
        $this->middleware('auth');
    }
    
    //função que leva a página inicial
    public function iniciar(){
        return view('catraca.home');
    }

    public function teste(){
        return view('welcome');
    }

    //Função de pesquisa / listagem de usuários que possuem biometria cadastrada
    public function listaControlCatrac(){
        //table paginada por 20 elementos
        $catraca = Catraca::orderBy('DATA PASSAGEM', 'desc')->orderBy('HORA', 'desc')->paginate(60);
        /*
        Retorno dos dados, ele me retorna a página junto com as váriaveis catraca (lista contendo todos os dados do banco) e o texto que servirá como chave da pesquisa para geração
        do pdf.
        */
        return view('listagem.listaControlCatrac')->with(['catraca'=> $catraca]);
    }

    public function listaUsuariosCatraca(){
        $catraca = ListaUsuariosCatraca::orderBy('NOME', 'asc')->paginate(60);

        return view('listagem.listausuarioscatraca')->with(['catraca' => $catraca]);
    }

    //Mesmas definições acima se aplicam para as funções de listagem, mudando somente algumas coisas em relação a busca
    public function listaBioCadastrada(){

        $catraca = CatracaBioCadastrada::orderBy('NOME', 'asc')->paginate(60);

        $contador = CatracaBioCadastrada::count();

        return view('listagem.listaBioCada')->with(['catraca'=> $catraca, 'contador' => $contador]);
    }

    public function listaSemCartao(){

        $catraca = CatracaPessSemCartao::leftJoin('CARTOES', 'CARTOES.COD_PESSOA', '=', 'FUNCIONARIOS.COD_PESSOA')
                                            ->whereNull('NUM_CARTAO')
                                            ->select('MATRICULA', 'NOME', 'NUM_CARTAO')->get();

        return view('listagem.listaSemCartao')->with(['catraca'=> $catraca]);
    }

    public function pesquisa_SemCartao(Request $request){
        $aux = $request->texto;

        if(empty($aux)){
            return CatracaControler::listaSemCartao();
        }

        $catraca = CatracaPessSemCartao::leftJoin('CARTOES', 'CARTOES.COD_PESSOA', '=', 'FUNCIONARIOS.COD_PESSOA')
                                            ->whereNull('NUM_CARTAO')->Where('NOME', 'like', '%'.$aux.'%')
                                            ->select('MATRICULA', 'NOME', 'NUM_CARTAO')->get();
        
        return view('listagem.listaSemCartao')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function pesquisa_BioCadastrada(Request $request){
        $aux = $request->texto;

        if(empty($aux)){
            return CatracaControler::listaBioCadastrada();
        }

        $catraca = CatracaBioCadastrada::where('COD_PESSOA', 'like', '%'.$aux.'%')
                                            ->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')
                                            ->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orWhere('OBSERVACAO', 'like', '%'.$aux.'%')
                                            ->orderBy('NOME', 'asc')->get();
       
        return view('listagem.listaBioCada')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function pesquisa_ListaUsuario(Request $request){
        $aux = $request->texto;

        if(empty($aux)){
            return CatracaControler::listaUsuariosCatraca();
        }

        $catraca = ListaUsuariosCatraca::where('DEPARTAMENTO', 'like', '%'.$aux.'%')
                                            ->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')
                                            ->orWhere('MATRICULA', 'like', '%'.$aux.'%')
                                            ->orderBy('NOME', 'asc')->get();

        return view('listagem.listausuarioscatraca')->with(['catraca' => $catraca, 'chavepesquisa' => $request->texto]);
    }

    public function pesquisa2(Request $request){
        $aux = $request->texto;
        
        if (empty($aux)){
            return CatracaControler::listaControlCatrac();
        }

        $catraca = Catraca::where('DEPARTAMENTO', 'like', '%'.$aux.'%')
                    ->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')
                    ->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orWhere('OBSERVACAO', 'like', '%'.$aux.'%')
                    ->orderBy('DATA PASSAGEM', 'desc')
                    ->orderBy('HORA', 'desc')->get();

        return view('listagem.listaControlCatrac')->with(['catraca'=> $catraca, 'chavepesquisa'=> $aux]);
    }

    //função não implementada de geração de PDF, utiliza o DOMPDF, biblioteca do laravel para criação de PDF
    public function metodopdf(Request $request){
        $aux = $request->chavepesquisa;

        $catraca = CatracaControler::pesquisa2($aux);

        return \PDF::loadView('catraca.layoutpdf', compact('catraca'))->setPaper('a4', 'landscape')->stream('relatorio.pdf');
    }

    public function suporte(){
        return view('email.email_site');
    }

    public function attStatus(Request $request){
        $aux = $request->id;
        

        if(empty($aux)){
            return CatracaControler::chamados();
        }

        Contato::find($aux)->update(['status' => 1]);

        return CatracaControler::chamados();
    }

    public function chamados(){
        $contato = Contato::orderBy('created_at', 'desc')->paginate(20);

        return view('email.chamado')->with(['contato'=> $contato]);
    }

    public function removeStatus(Request $request){

        if(empty($request->id)){
            return CatracaControler::chamados();
        }

        Contato::find($request->id)->delete();

        return CatracaControler::chamados();
    }

    public function enviaEmail(Request $request){
        $email = array('site@lourencofilho.com.br');

        Contato::create($request->all());

        Mail::to($email)->cc('site@lourencofilho.com.br')->send(new contatoEmail($request));

        return view('email.sucess');
    }

}
