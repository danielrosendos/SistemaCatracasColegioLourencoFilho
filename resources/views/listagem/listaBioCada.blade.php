@extends('layouts.principal') @section('conteudo')
<h1 class="text-center">Listagem Biometria Cadastradas</h1>   

<div align="center" class="pt-3">    
    <div class="container">
        <div class="col-md-4">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="{{ action('CatracaControler@pesquisa_BioCadastrada') }}" aria-label="{{ __('Pesquisar') }}" role="search">
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
      <th scope="col">Código Pessoa</th>
      <th scope="col">Nome</th>
      <th scope="col">Número Cartão</th>
      <th scope="col">Matrícula</th>
      <th scope="col">Observação</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($catraca as $c)
    <tr>
      <td>{{ $c->COD_PESSOA }} </td>
      <td>{{ $c->NOME }} </td>
      <td>{{ $c->NUM_CARTAO }} </td>
      <td>{{ $c->MATRICULA }} </td>
      <td>{{ $c->OBSERVACAO }} </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop