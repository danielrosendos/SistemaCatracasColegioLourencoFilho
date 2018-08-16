@extends('layouts.principalgb') @section('conteudo')

<div class="section section-team text-center">
    <div class="container">

        <h2 class="title pb-5">
            <img src="{{ asset('img/mob-logo.svg') }}" alt="Build Status" style="width: 100px; height:auto; margin-right:20px; max-width: 100%;">            Seja
            Bem Vindo ao SICC - Cadastro Gustavo Brigido</h2>
        <div class="team mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/listaGB.png') }}" alt="Biometria Cadastrada" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Listagem Alunos</h4>
                        <p style="text-align: justify">Trata-se da Listagem dos Alunos do Gustavo Brigido, que estão devidamente Cadastrados no Sitema</p>
                        <a href="{{ action('ControllerGB@listagem') }}" class="btn btn-info ">CONSULTAR</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/cadastro.png') }}" alt="Biometria Cadastrada" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Cadastro Alunos</h4>
                        <p style="text-align: justify">Trata-se do formulário de cadastro para novos alunos gustavo brigido,
                            que utilizem instalações do colégio Lourenço Filho.</p>
                        <a href="{{ action('ControllerGB@registrar', 0) }}" class="btn btn-info ">CADASTRAR</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/supp.png') }}" alt="Suporte" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Suporte </h4>
                        <p style="text-align: justify">Trata-se do Contato Direto com o Suporte do Colégio Lourenço Filho,
                            para Reportar erros das Catracas</p>
                        <a href="{{ action('ControllerGB@suporteGB') }}" class="btn btn-info ">CONTATO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection