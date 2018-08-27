@extends('layouts.principal') @section('conteudo')

<div class="section section-team text-center">
    <div class="container">
        <h2 class="title pb-5"><img src="{{ asset('img/mob-logo.svg') }}" alt="Build Status" style="width: 100px; height:auto; margin-right:20px; max-width: 100%;">Seja Bem Vindo ao SICC</h2>
        <div class="team mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/biometria.png') }}" alt="Biometria Cadastrada" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Usuários Com Biometria Cadastradas</h4>
                        <p style="text-align: justify">Trata-se da listagem de todos os funcionários ou alunos que possuem a biometria cadastrada nas catracas.</p>
                        <a href="{{ action('CatracaControler@listaBioCadastrada') }}" class="btn btn-info ">CONSULTAR</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/07.png') }}" alt="Controle Catracas" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Controle Horário das Catracas</h4>
                        <p style="text-align: justify">Listagem contendo informações da catraca, entre horários que foi acionado a catraca, Usuários que
                            utilizaram à catraca e entre outros.</p>
                        <a href="{{ action('CatracaControler@listaControlCatrac') }}" class="btn btn-info ">CONSULTAR</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/08.png') }}" alt="Cadastro Cartão" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Usuários Sem Cartão Cadastrado</h4>
                        <p style="text-align: justify">Trata-se da listagem de todos os funcionários ou alunos que não possuem cartão vinculado, contém
                            campo cadastra cartão.</p>
                        <a href="{{ action('CatracaControler@listaSemCartao') }}" class="btn btn-info ">CONSULTAR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="team mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ asset('img/supp.png') }}" alt="Suporte" class="rounded-circle img-fluid img-raised">
                        <h4 class="title">Suporte</h4>
                        <p style="text-align: justify">Trata-se do Contato Direto com o Suporte do Colégio Lourenço Filho, para Reportar erros das Catracas</p>
                        <a href="{{ action('CatracaControler@suporte') }}" class="btn btn-info ">CONTATO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection