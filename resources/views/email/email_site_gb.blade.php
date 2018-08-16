@extends('layouts.principalgb') @section('conteudo')
<div class="page-header">
    <div class="container">
        <div class="col-md-4 content-center mt-5 ">
            <h2 class="title">No Que Podemos Ajudar?</h2>
            <div class="card-header">{{ __('Entrar em Contato') }}</div>
            <div class="card-body">
                <form method="POST" class="form" action="{{ action('ControllerGB@enviaEmailGB') }}" aria-label="{{ __('Email') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="problema" class="col-md-4 col-form-label text-md-right">{{ __('Tipo do Problema') }}</label>

                        <div class="col-md-6">
                            <input id="problema" type="text" class="form-control" name="problema" value="{{ old('problema') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="menssagem" class="col-md-4 col-form-label text-md-right">{{ __('Relatar Problema') }}</label>

                        <div class="col-md-6">
                            <div class="textarea-container">
                                <textarea class="form-control" name="menssagem" rows="4" cols="80" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0" align="right">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info">
                                {{ __('Enviar Menssagem') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop