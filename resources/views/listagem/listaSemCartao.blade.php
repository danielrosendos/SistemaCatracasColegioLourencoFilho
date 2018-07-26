@extends('layouts.principal') @section('conteudo')
<h1 class="text-center">Listagem Usuários Sem Cartão Vínculado</h1>

<table class="table table-striped table-bordered table-hover">

    <thead>
        <tr>
            <th scope="col">Matrícula</th>
            <th scope="col">Nome</th>
            <th scope="col">Número Cartão</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catraca as $c)
        <tr>
            <td>{{ $c->MATRICULA }} </td>
            <td>{{ $c->NOME }} </td>
            <td>{{ $c->NUM_CARTAO }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop