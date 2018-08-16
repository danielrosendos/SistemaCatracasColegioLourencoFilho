@extends('layouts.principalgb') @section('conteudo')

<h1 class="text-center">Listagem Alunos Gustavo Brigido</h1>

<div align="center" class="pt-3">
    <div class="container">
        <div class="col-md-4">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="{{ action('ControllerGB@pesquisaGB') }}" aria-label="{{ __('Pesquisar') }}" role="search">
                    @csrf
                    <div class="content" aligh="center">
                        <div class="input-group form-group-no-border input-lg">
                            <spam class="input-group-addon">
                                <i class="now-ui-icons ui-1_zoom-bold"></i>
                            </spam>
                            <input type="text" name="texto" class="form-control" placeholder="Pesquisar" autofocus>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-bordered table-hover">

    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Curso</th>
            <th scope="col">Inicío</th>
            <th scope="col">Fim</th>
            <th scope="col">Editar</th>
            <th scope="col">Deletar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listagem as $l)
        <tr>
            <td>{{ $l->name }} </td>
            <td>{{ $l->email }} </td>
            <td>{{ $l->curso }} </td>
            <td>{{ date('d/m/Y', strtotime($l->inicio))}}</td>
            <td>{{ date('d/m/Y', strtotime($l->fim))}}</td>
            <td>
                <a href="{{ action('ControllerGB@registrar', $l->id) }}">
                    <spam class="now-ui-icons ui-1_settings-gear-63"></spam>
                </a>
            </td><td>
                <a href="{{ action('ControllerGB@deletar', $l->id) }}">
                    <spam class="now-ui-icons ui-1_simple-remove"></spam>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection