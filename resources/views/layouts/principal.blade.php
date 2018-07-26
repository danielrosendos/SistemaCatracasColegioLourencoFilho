<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Lourenço Filho - Controle Catracas</title>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="  {{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
    />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href=" {{ asset('css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href=" {{ asset('css/now-ui-kit.css?v=1.1.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href=" {{ asset('css/demo.css') }} " rel="stylesheet" />
</head>

<body class="login-page bootstrap-collapse">
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <div class="navbar-translate col-md-2 mx-md-5">
                <a class="navbar-brand" href="{{ action('CatracaControler@iniciar') }}" rel="tooltip" title="Lourenço Filho - Controle Catracas"
                    data-placement="bottom">
                    <img src="{{ asset('img/mob-logo.svg') }}" style="width: 80px; height: 80px" />
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <p>{{ __('Logar') }}</p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('CatracaControler@iniciar') }}">
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <p>{{ __('Registar Usuário') }}</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container">
        <div class="tim-row tim-row-first">
            @yield('conteudo')
        </div>
    </div>

</body>

<!--   Core JS Files   -->
<script src=" {{ asset('js/core/jquery.3.2.1.min.js') }} " type="text/javascript"></script>
<script src=" {{ asset('js/core/popper.min.js') }} " type="text/javascript"></script>
<script src=" {{ asset('js/core/bootstrap.min.js') }} " type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src=" {{ asset('js/plugins/bootstrap.switch.js') }} "></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src=" {{ asset('js/plugins/nouislider.switch.js') }} " type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src=" {{ asset('js/plugins/bootstrap-datepicker.js') }} " type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src=" {{ asset('js/now-ui-kit.js?v=1.1.0') }} " type="text/javascript"></script>

</html>