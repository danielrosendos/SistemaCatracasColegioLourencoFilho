<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Catraca;
use Barryvdh\DomPDF\Facade as PDF;
use App;
use App\CatracaBioCadastrada;
use App\CatracaPessSemCartao;

set_time_limit(0);

 

class CatracaControler extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function listaControlCatrac(Request $request){
        $aux = $request->texto;

        $catraca = Catraca::where('DEPARTAMENTO', 'like', '%'.$aux.'%')->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orderBy('NOME')->get();

        return view('listagem.listaControlCatrac')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function listaBioCadastrada(Request $request){
        $aux = $request->texto;

        $catraca = CatracaBioCadastrada::where('COD_PESSOA', 'like', '%'.$aux.'%')->orWhere('NOME', 'like', '%'.$aux.'%')->orWhere('NUM_CARTAO', 'like', '%'.$aux.'%')->orWhere('MATRICULA', 'like', '%'.$aux.'%')->orderBy('NOME')->get();

        return view('listagem.listaBioCada')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function listaSemCartao(Request $request){
        $catraca = CatracaPessSemCartao::leftJoin('CARTOES', 'CARTOES.COD_PESSOA', '=', 'FUNCIONARIOS.COD_PESSOA')->whereNull('NUM_CARTAO')->select('MATRICULA', 'NOME', 'NUM_CARTAO')->get();

        return view('listagem.listaSemCartao')->with(['catraca'=> $catraca, 'chavepesquisa'=> $request->texto]);
    }

    public function iniciar(){
        return view('catraca.home');
    }

    public function metodopdf(Request $request){
        print($request->chavepesquisa);

        $catraca = CatracaControler::pesquisa2($request->chavepesquisa);

        return \PDF::loadView('catraca.layoutpdf', compact('catraca'))->setPaper('a4', 'landscape')->stream('relatorio.pdf');
    }

}
