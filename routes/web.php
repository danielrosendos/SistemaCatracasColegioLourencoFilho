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
});

Route::group(['middleware' => 'user'], function(){
    Route::any('/home', 'ControllerGB@iniciar');
    Route::any('/registro', 'ControllerGB@registrar');
    Route::any('/registro/cadastro', 'ControllerGB@adicionar');
});

Route::group(['middleware' => ['web','auth']], function(){

    Route::get('/', function(){
        if(Auth::user()->isAdmin == 0){
            return view('gb.homegb');
            
        }else{
            $users['users'] = \App\User::all();
            return view('catraca.home', $users);
        }
    });
});