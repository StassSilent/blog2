<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Вход</title>

    <script src="{{asset('css/js/jquery.min.js')}}"></script>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/styles1.css')}}" rel="stylesheet">
<link href="{{asset('css/styles2.css')}}" rel="stylesheet">
<link href="{{asset('css/form-validation.css" rel="stylesheet')}}">
</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="navbar nav_Menu">
        <nav class="navbar navbar-right navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark navbar-default  fixed-top navMenu">
            <div class="container-fluid">
                <!--  <a class="navbar-brand pl-200" href="#"></a>-->
                <a  href="{{('index')}}">Home</a>
            </div>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="py-5 text-center">
                <h2>Вход</h2>
            </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Логин') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Запомнить') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Войти') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Забыли пароль?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@include ('layouts.footerNavigation')
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/js/jquery.js')}}"></script>
<script src="{{asset('js/js/bootstrap.min.js')}}"></script>
</body>
</html>