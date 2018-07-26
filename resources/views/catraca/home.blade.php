@extends('layouts.principal') @section('conteudo')

<div class="section section-team text-center">
            <div class="container">
                <h2 class="title pb-5">Sejam Bem Vindos Ao Sistema Catracas</h2>
                <div class="team mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ asset('img/bio2.png') }}" alt="Biometria Cadastrada" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Usuários Com Biometria Cadastradas</h4>
                                <p>Trata-se da listagem de todos os funcionários ou alunos que possuem a biometria cadastrada nas catracas.</p>
                                <a href="{{ action('CatracaControler@listaBioCadastrada') }}" class="btn btn-info ">CONSULTAR</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ asset('img/control.png') }}" alt="Controle Catracas" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Controle Horário das Catracas</h4>
                                <p>Listagem contendo informações da catraca, entre horários que foi acionado a catraca, Usuários que utilizaram à catraca e entre outros.</p>
                                <a href="{{ action('CatracaControler@listaControlCatrac') }}" class="btn btn-info ">CONSULTAR</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ asset('img/biometria.png') }}" alt="Cadastro Cartão" class="rounded-circle img-fluid img-raised">
                                <h4 class="title">Usuários Sem Cartão Cadastrado</h4>
                                <p>Trata-se da listagem de todos os funcionários ou alunos que não possuem cartão vinculado, contém campo cadastra cartão.</p>
                                <a href="{{ action('CatracaControler@listaSemCartao') }}" class="btn btn-info ">CONSULTAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
