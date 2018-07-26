<?php

Route::any('/listarBioCadastrada', 'CatracaControler@listaBioCadastrada');

Route::any('/listarControlCatrac', 'CatracaControler@listaControlCatrac');

Route::any('listarSemCartao', 'CatracaControler@listaSemCartao');

Route::any('/listar/pdf', 'CatracaControler@metodopdf')->name('Relatorio');

Route::any('/home', 'CatracaControler@iniciar');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
