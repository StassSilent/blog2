<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Администратор</title>

    <!-- Bootstrap core CSS -->
    {{--<script src="{{asset('css/js/jquery.min.js')}}"></script>--}}
    {{--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/styles1.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles2.css')}}" rel="stylesheet">



</head>

<body class="rbackground">
@include ('layouts.headerNavigetion')

<div class="container-fluid">
    <div class="row pl-5 pt-5">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class="sz">Общее количество пользователей<br>
                <h1 class="font_h1"><b>{{ $user_count }}</b></h1>
            </div>

        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class=" sz">Добавившиеся  за месяц
                <br>
                <h1 class="font_h1"> <b>{{ $user_new}}</b></h1></div>
        </div>

        {{--<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12" >--}}
            {{--<div class=" sz">Всего заявок<br>--}}
                {{--<h1 class="font_h1"> <b>{{ $categ_count }}</b></h1></div>--}}
        {{--</div>--}}

        {{--<div class="col-md-3 col-lg-3  col-sm-6 col-xs-12">--}}
            {{--<div class=" sz">Выполненные<br>--}}
                {{--<h1 class="font_h1"> <b>{{$Notcompleted}}</b></h1></div>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>
<div class="container">
    <div class="row pt-5 pl-5">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
            <div class="sz3 pb-4 pl-4 pt-4 " >

                <table class="border" align="">
                    <tr>
                        <td>
                            <button  type="button" class="btn btn-danger find_block"  id="find_block" name="find_block">Заблокированные</button>
                        </td>
                        <td>
                            <button  type="button" class="btn btn-info" id="find_grant" name="find_grant">Привелегии</button>
                        </td>
                        <td >
                            <input type="text" placeholder="Искать" id="find_user" name="find_user" align="right">
                        </td>
                    </tr>
                </table>

                <div class="table-responsive-sm mr-4">
                    <table class="table table-hover table-sm">
                        <thead style="background: rgba(0,0,0,0.09);">
                        <tr >
                            <th scope="row" style="width: 50px;">id</th>
                            <th scope="col" style="width: 70px"></th>
                            <th scope="col" style="width: 150px">Логин</th>
                            <th scope="col" style="width: 150px">email</th>
                            <th scope="col" align="right" class="mr-5"></th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div style="height: 230px;" class="scroll">
                    <div class="table-responsive-sm mr-4">

                        <table class="table table-hover table-sm">

                            <tbody id="update">

                            {{--<div id="update">--}}
                            @foreach ($data as $user)
                                <tr>

                                    <td scope="row" style="width: 50px;">{{ $user->id }}</td>
                                    <td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/{{$user->id}}"><img class="data_img" src="{{asset('img').'/'.$user->photo}}"/></a></td>
                                    <td style="width: 150px">{{ $user->login}}</td>
                                    <td style="width: 150px">{{ $user->email}}</td>
                                    <td align="right" class="">
                                        @if($user->grant>1)
                                        <button id="grant{{$user->id}}" value="grant{{$user->login}}" class="btn btn-info grant" name="{{$user->id}}" type="button" style="display: none;">Назначить редактором</button>
                                            <button id="grant{{$user->login}}" value="grant{{$user->id}}" class="btn btn-info ungrant" name="{{$user->id}}" type="button">Снять права редактора</button>

                                        @elseif($user->grant<1)

                                            <button id="grant{{$user->id}}" value="grant{{$user->login }}" class="btn btn-info grant" name="{{$user->id}}" type="button" >Назначить редактором</button>
                                            <button id="grant{{$user->login}}" value="grant{{$user->id }}" class="btn btn-info ungrant" name="{{$user->id}}" type="button" style="display: none;">Снять права редактора</button>
                                        @endif

                                    </td>
                                    <td align="right" class="mr-5">

                                        <input class="name" id="name" value="{{ $user->id }}" type="hidden">
                                        <input class="name1" id="name1" value="{{ $user->login }}" type="hidden">
                                        @if(($user->block!=1)&&($user->grant!=1))
                                            <button class="btn btn-danger btn1" id="{{ $user->id }}" value="{{ $user->login }}" type="button"  name="block-but">Заблокировать</button>
                                            <button id="{{ $user->login }}" value="{{ $user->id }}" class="btn btn-success un" name="un" type="button" style="display: none;">Разблокировать</button>
                                        @elseif(($user->block==1)&&($user->grant!=1))
                                            <button class="btn btn-danger btn1" id="{{ $user->id }}" value="{{ $user->login }}" type="button"  name="block-but" style="display: none;">Заблокирвоать</button>
                                            <button id="{{ $user->login }}" value="{{ $user->id }}" class="btn btn-success un" name="un" type="button" >Разблокировать</button>
                                        @endif
                                    </td>

                                </tr>
                            @endForeach

                            {{--</div>--}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <div class="row pt-5 pl-5">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                <div class="sz3 pb-4 pl-4 pt-4 " >

                <div class="table-responsive-sm mr-4">
                <table class="table table-hover table-sm">
                    <thead style="background: rgba(0,0,0,0.09);">
                    <tr >
                        <th scope="col" style="width: 70px"></th>
                        <th scope="col" style="width: 150px">Логин</th>
                        <th scope="col" align="right" class="mr-5">Жалоба</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div style="height: 230px;" class="scroll">
                <div class="table-responsive-sm mr-4">

                    <table class="table table-hover table-sm">

                        <tbody id="update1">

                        {{--<div id="update">--}}
                        @foreach ($comp as $comp)
                            <tr id="c{{ $comp->id }}">

                                {{--<td scope="row" style="width: 50px;">{{ $comp->id }}</td>--}}
                                <td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/{{$comp->userc}}"><img class="data_img" src="{{asset('img').'/'.$comp->photo}}"/></a></td>
                                <td style="width: 150px">{{ $comp->name}}</td>
                                <td><div class="complain" style="width: 300px; !important;"> {{$comp->complain}}</div></td>
                                <td align="right" class="mr-5">
                                    <button class="btn btn-dark btnFull" id="{{ $comp->id }}" value="{{ $comp->id}}" type="button"  name="{{ $comp->id}}" data-toggle="modal" data-target="#exampleModalCenter" >Полностью</button>
                                </td>
                                <td align="right" class="mr-5">


                                    <button class="btn btn-success btnDelComp" id="{{ $comp->id }}" value="{{ $comp->id }}" type="button"  name="b" >Рассмотренная</button>
                                </td>
                            </tr>
                        @endForeach

                        {{--</div>--}}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="width: 500px;">
                <div id="complain_in_modal">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@include ('layouts.footerNavigation')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/admin_panel_js.js') }}"></script>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
{{--<script src="{{asset('js/js/bootstrap.min.js')}}"></script>--}}
</body>
</html>