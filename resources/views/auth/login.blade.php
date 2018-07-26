@extends('layouts.principal') @section('conteudo')
<div class="page-header">
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="{{ asset('img/logo.svg') }}">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                            <spam class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </spam>
                            <input id="identity" type="identity" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity"
                                value="{{ old('identity') }}" required autofocus placeholder="Digite Seu Login">
                        </div>
                        @if ($errors->has('identity'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('identity') }}</strong>
                        </span>
                        @endif

                        <div class="input-group form-group-no-border input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_send"></i>
                            </span>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required placeholder="Digite Sua Senha">
                        </div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif


                        <div class="container">
                            <div class="offset-md-10">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Logar') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection