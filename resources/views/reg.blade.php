<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <script src="{{asset('css/js/jquery.min.js')}}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/styles1.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
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
    <div class="py-5 text-center">
        <h2>Новый пользователь?</h2>
        <p class="lead">Зарегестрируйтесь и отредактируйте профиль в личном кабинете</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <form class="needs-validation" novalidate method="post" action="{{route('register')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="login">Логин</label>
                        <input name="name"   type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Введите имя..." value="" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>

                <div class=" mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@mail.ru" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="checkbox mb-3">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required><p style="font-size: small; color: red">Пароль должен содержать не менее шести символов</p>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="checkbox mb-3">
                    <label for="password-confirm">Повторите пароль</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                {!! Recaptcha::render() !!}
                <div class="checkbox mb-3">
                    <hr class="mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Зарегестрироваться</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


@include ('layouts.footerNavigation')
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/holder.min.js')}}"></script>
<script src="{{asset('js/js/jquery.js')}}"></script>
<script src="{{asset('js/js/bootstrap.min.js')}}"></script>
</body>
</html>