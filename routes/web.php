<?php

Auth::routes();

Route::group(['middleware' => 'admin'], function(){

    Route::any('/listarBioCadastrada', 'CatracaControler@listaBioCadastrada');

    Route::any('/listaControlCatrac/pesquisa', 'CatracaControler@pesquisa2');

    Route::any('/listarControlCatrac', 'CatracaControler@listaControlCatrac');

    Route::any('/listarBioCadastrada/pesquisa', 'CatracaControler@pesquisa_BioCadastrada');

    Route::any('/listarSemCartao', 'CatracaControler@listaSemCartao');

    Route::any('/listarSemCartao/pesquisa', 'CatracaControler@pesquisa_SemCartao');

    Route::any('/listar/pdf', 'CatracaControler@metodopdf')->name('Relatorio');

    Route::any('/home', 'CatracaControler@iniciar');

    Route::get('/suporte', 'CatracaControler@suporte');

    Route::any('/suporte/emailContato', 'CatracaControler@enviaEmail');

    Route::any('/teste', 'CatracaControler@teste');
});

Route::group(['middleware' => 'user'], function(){
    
    Route::any('/homeGB', 'ControllerGB@iniciar');

    Route::any('/registro/{id}', 'ControllerGB@registrar')->where('id', '[0-9]+');

    Route::any('/registro/cadastro/{id}', 'ControllerGB@adicionar')->where('id', '[0-9]+');

    Route::any('/suporteGB', 'ControllerGB@suporteGB');

    Route::any('/suporteGB/emailContato', 'ControllerGB@enviaEmailGB');

    Route::any('/listagemGB', 'ControllerGB@listagem');

    Route::any('/listagemGB/pesquisa', 'ControllerGB@pesquisaGB');

    Route::any('/listagemGB/deletar/{id}', 'ControllerGB@deletar')->where('id', '[0-9]+');
});

Route::group(['middleware' => ['web','auth']], function(){

    Route::get('/', function(){
        if(Auth::user()->isAdmin == 0){
            return view('gb.homegb');
            
        }else{
            return view('catraca.home');
        }
    });
});