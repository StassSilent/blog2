
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	

    <title>Главная</title>

    <!-- Bootstrap core CSS -->

      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{asset('css/styles1.css')}}" rel="stylesheet">
      <link href="{{asset('css/styles2.css')}}" rel="stylesheet">
      <link href="{{asset('css/styles.css')}}" rel="stylesheet">
 <link href="{{asset('css/carousel.css" rel="stylesheet')}}">
  </head>

  <body>
  <div class="container-fluid" >

   @include ('layouts.headerNavigetion')
	

        <div class="row header">

                <div class="translate col-xl-10 col-lg-10 col-md-10 ">
                  Translators' House
                  <br>Сообщество переводчиков
                </div>

              </div>

         <div class="row">
 
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 hello">
         <div class="jumbotron">
          <h1>Станьте переводчиком или найдите переводчика для себя, а также общайтесь на форуме</h1>
          <p><a class="btn btn-secondary mr-sm-4" href="#" role="button">Узнать больше &raquo;</a></p>
            <p><a class="btn btn-primary btn-lg" href="{{('/create')}}" role="button"  >Подать объявление</a></p>
        </div>
      </div>

 
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
  
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block" src="imgs/book.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="imgs/news.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
   
   
</div>
</div>

<!-- Three columns of text below the carousel -->
        <div class="row text-center justify-content-center">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" >
             <p class="number" > <span>1</span></p>
            <h2>Зарегистрируйтесь</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Перейти к регистрации &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" >
              <p class="number" > <span>2</span></p>
            <h2>Станьте исполнителем или заказчиком</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Сделать заказ &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" >
              <p class="number" > <span>3</span></p>
            <h2>Получите деньги или выполненый заказ</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-secondary" href="#" role="button">Узнать больше &raquo;</a></p>
          </div>
        </div>
      </div>
  @include ('layouts.footerNavigation')
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>

