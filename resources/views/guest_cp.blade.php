@extends('navigation')

@section('user_content')
    <div class="container">
        <div class="row row_pad">
            <div class="col-md-3 img-responsive">
                <div class="butg">
                    <img class="img_border img-thumbnail avatar" align="right" id="avatar"  src="{{asset('img').'/'.$guest[0]->photo}}" alt="../img/grey.jpg">
                </div>
                <div align="center">
                <form method="get" action="/messages/{{$guest[0]->id}}">
                    @method('get')
                    <input type="hidden" value="{{$guest[0]->id}}" name="id_2">
                    <input type="submit" value="Написать сообщение">
                </form>
                </div>
            </div>


            <div class="col-md-9">

                <div class="container cont_box">

                    <div class="row">
                        <div class="col-md-6 text-left pt-2">
                            <h2>{{ $guest[0]->name }}</h2>
                        </div>
                        {{--<div class="col-md-6 text-right pt-2">--}}
                            {{--<h2>{{ $user->rating }}</h2>--}}
                        {{--</div>--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h id="tt"></h>

                            <hr>
                                <p class="pt-2" id="text">{{ $guest[0]->about }}</p>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

    </div>



@endsection
@extends('footer')
