@extends('layouts.principalgb') @section('conteudo')
<div class="page-header">
    <div class="container">
        <div class="col-md-4 content-center mt-5 ">
            <div class="card-header">{{ __('Registar Novo Usuário') }}</div>
            <div class="card-body">
            @if(old('name'))
                <div class="alert alert-success">
                    <strong>Sucesso!</strong> O produto {{ old('name') }} foi adicionado corretamente
                </div>
            @endif
                <form method="POST" class="form" action="{{ action('ControllerGB@adicionar') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" require>{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                required autofocus> @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right" require>{{ __('Endereço de E-mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                required> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="curso" class="col-md-4 col-form-label text-md-right" require>{{ __('Curso') }}</label>

                        <div class="col-md-6">
                            <input id="curso" type="text" class="form-control{{ $errors->has('curso') ? ' is-invalid' : '' }}" name="curso"
                                required> @if ($errors->has('curso'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('curso') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="data-inicio" class="col-md-4 col-form-label text-md-right" require>{{ __('Data de Inicio') }}</label>

                        <div class="col-md-6">
                            <input id="data-inicio" type="date" class="form-control" name="data-inicio" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="data-fim" class="col-md-4 col-form-label text-md-right" require>{{ __('Data de Termino') }}</label>

                        <div class="col-md-6">
                            <input id="data-fim" type="date" class="form-control" name="data-fim" required>
                        </div>
                    </div>

                    <div class="form-group mb-0" align="right">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-info">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection