<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Редактор</title>
    <script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/styles2.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row pl-5 pt-5">
        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class="sz">Общее количество объявлений<br>
                <h1 class="font_h1"><b>{{$col}}</b></h1>
            </div>

        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
            <div class=" sz">В режиме выполнения
                <br>
                <h1 class="font_h1"> <b>{{$runtime}}</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12" >
            <div class=" sz">Завершенные (по времени) <br>
                <h1 class="font_h1"> <b>{{$completed}}</b></h1></div>
        </div>

        <div class="col-md-3 col-lg-3  col-sm-6 col-xs-12">
            <div class=" sz">Незавершенные (по времени)<br>
                <h1 class="font_h1"> <b>{{$Notcompleted}}</b></h1></div>
        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-md-6  col-sm-12 col-xs-12">
            <div class="sz1 border">

            </div>
        </div>
      <!--  <div class="col-md-6  col-sm-12 col-xs-12">
            <div class="container">
                <div class="row" align="left">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div>
                            <canvas id="myCanvas">
                            </canvas>
                            <script type="text/javascript" src="{{asset('js/diagram.js')}}"></script>
                        </div>
                    </div>
                </div>
                <div class="row" align="left">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 pt-3">
                        <div>
                            <canvas id="myCanvas2">
                            </canvas>
                            <script type="text/javascript" src="{{asset('js/diagram2.js')}}"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="row pt-5 pl-5">
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
            <div class=" sz3" >


            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12" >
            <div class="border sz3">

            </div>
        </div>
    </div>
</div>
<script src="{{asset('bootstrap/dist/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>

</body>
</html>