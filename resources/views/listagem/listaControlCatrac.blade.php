@extends('layouts.principal2') @section('conteudo')

@if(empty($chavepesquisa))
<meta http-equiv="refresh" content="20" />
@endif

<h1 class="text-center">Listagem Controle Catracas</h1>

<div align="center" class="pt-3">
    <div class="container">
        <div class="col-md-4">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="{{ action('CatracaControler@pesquisa2') }}" aria-label="{{ __('Pesquisar') }}" role="search">
                    @csrf
                    <div class="content" aligh="center">
                        <div class="input-group form-group-no-border input-lg">
                            <spam class="input-group-addon">
                                <i class="now-ui-icons ui-1_zoom-bold"></i>
                            </spam>
                            <input type="text" name="texto" class="form-control" placeholder="Pesquisar" autofocus>
                        </div>
                        <input class="btn btn-info" type="submit" value="Pesquisar">
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
            <th scope="col">Departamento</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Observação</th>
            <th scope="col">Número Cartão</th>
            <th scope="col">Data da Passagem</th>
            <th scope="col">Hora</th>
            <th scope="col">Data da Consulta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catraca as $c)
        <tr>
            <td>{{ $c->NOME }} </td>
            <td>{{ $c->DEPARTAMENTO }} </td>
            <td>{{ $c->MATRICULA }} </td>
            <td>{{ $c->OBSERVACAO }} </td>
            <td>{{ $c->NUM_CARTAO }} </td>
            <td>{{ date('d/m/Y', strtotime($c->{'DATA PASSAGEM'}))}}</td>
            <td>{{ $c->HORA }} </td>
            <td>{{ $c->{'DATA DA CONSULTA'} }} </td>
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
                        @if(empty($chavepesquisa)) {{ $catraca->links() }} @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@stop