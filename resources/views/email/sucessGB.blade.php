@extends('layouts.principalgb') @section('conteudo')
<div class="page-header">
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card-header">Supote Catraca</div>
            <div class="card-body">
                <h2>E-mail Enviado Com Sucesso</h2>
            </div>
            <div class="form-group mb-0" align="center">
                <div class="col-md-6 offset-md-4">
                        <a href="{{ action('ControllerGB@iniciar') }}" class="btn btn-info">
                            {{ __('Voltar ao Inicio') }}
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop