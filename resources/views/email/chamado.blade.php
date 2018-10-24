@extends('layouts.principal2') @section('conteudo')
<h1 class="text-center">Chamados</h1>   

<table class="table table-striped table-bordered table-hover">

        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Tipo do Problema</th>
                <th scope="col">Menssagem</th>
                <th scope="col">Status</th>
                @if(Auth::user()->name == "admin" or Auth::user()->name == "bruno.nunes")
                <th scope="col">Atualizar Status</th>
                <th scope="col">Remover</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($contato as $c)
            <tr>
                <td>{{ $c->name }} </td>
                <td>{{ $c->problema }} </td>
                <td>{{ $c->menssagem }} </td>
                <td><span class="{{ $c->status == 0 ? 'badge badge-warning' : 'badge badge-success' }}">{{
                        $c->status == 0 ? 'Em Analise' : 'Processado' }}</span></td>
                @if(Auth::user()->name == "admin" or Auth::user()->name == "bruno.nunes")
                <td>
                    <a href="{{ action('CatracaControler@attStatus', $c->id) }}">
                        <spam class="now-ui-icons ui-1_check"></spam>
                    </a>
                </td>
                <td>
                    <a href="{{ action('CatracaControler@removeStatus', $c->id) }}">
                        <span class="now-ui-icons ui-1_simple-remove"></span>
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    

<div align="center" class="pt-3">
    <div class="container">
        <div class="col-md-4">
            <div class="card card-login card-plain">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-info">
                        {{ $contato->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@stop