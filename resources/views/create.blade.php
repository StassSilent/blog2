<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Добавление объявления</title>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/nouislider.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/smoothness/jquery-ui-1.8.10.custom.css')}}" rel="stylesheet">
    <script src="{{ asset('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
    <link href="{{asset('css/styles2.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

</head>
<body>
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

    <div class="container  header">
        <form action="/create/add" method="post">
            {{csrf_field()}}
            <div class="form-froup filterform">
                <h1>Заполните объявление</h1>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquage"> Язык оригинала</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <select  class="form-control" id="VoidSelectLanquage" name="language"  max-width="276">
                            <option disabled selected> Выбрать язык</option>
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage" name="language2" placeholder="Введите язык" >
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectLanquageTranslation"> Язык перевода</lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <select  class="form-control" id="VoidSelectLanquageTranslation" name="language_translation"  max-width="276">
                            <option disabled selected> Выбрать язык </option>
                            @foreach ($languages as $language)
                                <option> {{ $language->language }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage_translation" name="language_translation2"  placeholder="Введите язык" >
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-1 col-xs-1">
                        <lable for="VoidSelectType"> Тип </lable>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <select  class="form-control" id="VoidSelectType" name="type_category"  >
                            <option disabled selected> Выбрать тип</option>
                            @foreach ($categories as $category)
                                <option > {{ $category->category }}</option>
                            @endForeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-xs-3">
                        <input type="text" class="form-control" id="lanquage" name="type_category2"   placeholder="Введите категорию">
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidInputPrice">Сложность </lable>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="example">
                            <div id="complexity" class="noUi-target noUi-ltr noUi-horizontal"></div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1">
                        <select id="input-complexity" name="complexity" ></select>

                    </div>

                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidInputPrice">Цена (руб)</lable>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="example">
                            <div id="html5" class="noUi-target noUi-ltr noUi-horizontal"></div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-1">
                        <select id="input-select" name="price" ></select>
                    </div>

                </div><br>


                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="ad">Введите объявление (кратко)</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <textarea class="form-control " id="ad" cols="255"  name="add" rows="4" > </textarea>
                    </div>
                </div><br>
                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          <label for="link">Ссылка на источник</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input class="form-control" id="link" name="link">
                    </div>
                </div><br>
                <div class="form-row ">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="categoryPages">Введите объявление (полностью)</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <textarea class="form-control" id="categoryPages" name="category_pages" cols="2000" rows="10" required> </textarea>
                    </div>
                </div><br>
                <div class="form-row ">

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <lable for="VoidSelectOneDate"> Время на выполнение </lable>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker" name="dateStart"  data-date-format="yy-mm-dd"  placeholder="Начало"/>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input id="datepicker2" name="dateFinish" data-date-format="yy-mm-dd"  placeholder="Конец"/>
                    </div>

                </div><br>
                <div class="form-row ">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         <label >Вы можете добавить своё изображение</label>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <button type="button" class="ghost-button"  data-toggle="modal" data-target="#exampleModal">
                            Загрузить фото
                        </button>
                    </div>
                </div><br>
                <button class="btn btn-secondary btn-lg btn-block" type="submit">Отправить</button>
            </div>
        </form>

    </div>


</div>



@include ('layouts.footerNavigation')

<div class="modal fade" id="ResponseModal" tabindex="-1" role="dialog" aria-labelledy="ResponseModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">



                <button class="close" type="button" data-dismiss="modal" aria-lable="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Загрузка аватара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{url('/modal')}}" >


                <div class="modal-body">

                    @csrf
                    <img class=" img-responsive avatar-lg" id="pw" src="">
                    <input class="upload" name="image" type="file" id="uploadAvatar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/nouislider.min.js')}}"></script>
<script>
    $('#datepicker').datepicker({
        dateFormat:'yy-mm-dd',
        uiLibrary: 'bootstrap4'
    });


    $('#datepicker2').datepicker({
        dateFormat:'yy-mm-dd',
        uiLibrary: 'bootstrap4'
    });
    var select = document.getElementById('input-select');
    var selectcomplexity = document.getElementById('input-complexity');

    // Append the option elements price
    for ( var i = 0; i <= 10000; i++ ){

        var option = document.createElement("option");
        option.text = i;
        option.value = i;

        select.appendChild(option);
    }

    // Append the option elements complexity
    for ( var j = 0; j <= 5; j++ ){

        var option2 = document.createElement("option");
        option2.text = j;
        option2.value = j;

        selectcomplexity.appendChild(option2);
    }

    var html5Slider = document.getElementById('html5');
    var complexitySlider = document.getElementById('complexity');

    noUiSlider.create(html5Slider, {
        start: [ 200],
        range: {
            'min': 0,
            'max': 10000
        }
    });

    noUiSlider.create(complexitySlider, {
        start: [ 2 ],
        range: {
            'min': 0,
            'max': 5
        }
    });
    var inputNumber = document.getElementById('input-number');

    html5Slider.noUiSlider.on('update', function( values, handle ) {

        var value = values[handle];

        if ( handle ) {
            inputNumber.value = value;
        } else {
            select.value = Math.round(value);
        }
    });


    complexitySlider.noUiSlider.on('update', function( values, handle ) {
        var value = values[handle];
        if ( handle ) {
            inputNumber.value = value;
        } else {
            selectcomplexity.value = Math.round(value);
        }
    });

    select.addEventListener('change', function(){
        html5Slider.noUiSlider.set([this.value, null]);
    });


    selectcomplexity.addEventListener('change', function(){
        complexitySlider.noUiSlider.set([this.value, null]);
    });

</script>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>