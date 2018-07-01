
   <div class="  col-xl-12  main " id="main" >
<!--       --><?php
//       use App\Category;
//       $navlist = Category::select('categories.id as id', 'categories.category as category' )->get();
//       ?>
      <div id="mySidenav" class="sidenav">
          {{--@foreach ($navlist as $nav)--}}
          {{--<div><input type="hidden" value="{{ $nav->id }}"><a href="{{('category')}}">{{ $nav->category }}</a></div>--}}
          {{--@endForeach--}}
      </div>
      <!-- Use any element to open the sidenav -->

    <nav class="navbar navbar-expand-xl navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-dark navbar-default  fixed-top navMenu">

        <span style="font-size:30px;cursor:pointer" id="m" onclick="openNav()">&#9776;</span>

      <a class="nav-link active" href="{{('index')}}">
      	<img class="logo" src=""  alt="logo">
      </a>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      	<span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item forum">
            <a class="nav-link" href="#">Форум</a>
          </li>
           <li class="nav-item ">
          <form class="form-inline ">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info" type="submit">Search</button>
        </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{('/user_cp')}}">Личный кабинет</a>
          </li>
          <li class="nav-item reg">
            <a class="nav-link" href="{{('reg')}}">Регистрация</a>
          </li>
           @guest
           <li class="nav-item">
            <a class="nav-link" href="{{('/login')}}">Вход</a>
          </li >
           @endguest
           @auth
           <li class="nav-item">
               <div class="dropdown show ml-auto pt-2">
                   <a id="dropdownMenuLink" class="dropdown-toggle pt-3" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
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
           </li>
@endauth
        </ul>

      </div>


    </nav>
           </div>


       <script>
           /* Set the width of the side navigation to 250px */
           function openNav() {

               if (document.getElementById("mySidenav").style.width === "250px"){
                   document.getElementById("mySidenav").style.width = "0" ;
               }

               else
               {document.getElementById("mySidenav").style.width = "250px";


               }
           }
           /* Set the width of the side navigation to 0 */
       </script>
