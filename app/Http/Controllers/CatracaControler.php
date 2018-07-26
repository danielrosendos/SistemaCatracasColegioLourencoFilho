<?php

//Local onde se Encontra o arquivo, sua localização.
namespace App\Http\Controllers;

//Chamada das Classses do Laravel.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

//Chamada das classes que contém acesso ao banco de dados / tabelas
use App\Catraca;
use App\CatracaBioCadastrada;
use App\CatracaPessSemCartao;

set_time_limit(0);


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

    //Função de pesquisa / listagem de usuários que possuem biometria cadastrada
    public function listaControlCatrac(Request $request){
        //aux que pega a requisição do form, onde o nome no formulário é texto, pega o texto de parametro da pesquisa
        $aux = $request->texto;

        /*Uso do Eloquent do laravel, ele irá buscar na classe Catraca(classe que possue o acesso a tabela), e irá procurar na tabela, por departamento, matricula, nome
        numero cartão e irá ordenar por nome.
        */
        $catraca = Catraca::where('DEPARTAMENTO', 'like', '%'.$aux.'%')->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orderBy('NOME')->get();

        /*
        Retorno dos dados, ele me retorna a página junto com as váriaveis catraca (lista contendo todos os dados do banco) e o texto que servirá como chave da pesquisa para geração
        do pdf.
        */
        return view('listagem.listaControlCatrac')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    //Mesmas definições acima se aplicam para as funções de listagem, mudando somente algumas coisas em relação a busca
    public function listaBioCadastrada(Request $request){
        $aux = $request->texto;

        $catraca = CatracaBioCadastrada::where('COD_PESSOA', 'like', '%'.$aux.'%')->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orderBy('NOME')->get();

        return view('listagem.listaBioCada')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function listaSemCartao(Request $request){
        $catraca = CatracaPessSemCartao::leftJoin('CARTOES', 'CARTOES.COD_PESSOA', '=', 'FUNCIONARIOS.COD_PESSOA')->whereNull('NUM_CARTAO')->select('MATRICULA', 'NOME', 'NUM_CARTAO')->get();

        return view('listagem.listaSemCartao')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    //função que leva a página inicial
    public function iniciar(){
        return view('catraca.home');
    }

    //função não implementada de geração de PDF, utiliza o DOMPDF, biblioteca do laravel para criação de PDF
    public function metodopdf(Request $request){
        print($request->chavepesquisa);

        $catraca = CatracaControler::pesquisa2($request->chavepesquisa);

        return \PDF::loadView('catraca.layoutpdf', compact('catraca'))->setPaper('a4', 'landscape')->stream('relatorio.pdf');
    }

}
