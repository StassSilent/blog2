

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Личный кабинет</title>

    <!-- Bootstrap core CSS -->
    {{--<script src="{{asset('css/js/jquery.min.js')}}"></script>--}}
{{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{asset('css/styles1.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <link href="{{asset('css/chat.css')}}" rel="stylesheet">

</head>

<body>


<div class="container-fluid">

    <div class="navbar nav_Menu">
        <nav   class="navbar navbar-right navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark navbar-default  fixed-top navMenu">
            <div class="container-fluid">
                <div class="dropdown show ml-auto">
                    <a id="dropdownMenuLink" class="dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu w-25 dropdown-menu-right" aria-labelledby="dropdownMenuLink">

                <a class="dropdown-item w-25" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Выйти
                </a>


                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                    </div>
                </div>

            </div>
        </nav>
    </div>


    <div class="sidenav">
        <a href="{{('/')}}">На главную</a>
        <a href="#">Профиль</a>
        <a href="{{('/dialog')}}" role="button" id="mdialog">Сообщения</a>
        <a href="#">Проекты</a>
        <a href="#">Форум</a>
    </div>

    <script>

    </script>



    <div class="main">
      @yield('user_content')


    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{asset('js/js/jquery.js')}}"></script>--}}
{{--<script src="{{asset('js/js/bootstrap.min.js')}}"></script>--}}
<script type="text/javascript">


    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#pw').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#uploadAvatar").change(function() {
        readURL(this);
    });
</script>





<script src="{{ asset('js/about.js') }}"></script>
<script src="{{ asset('js/dialogs.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>