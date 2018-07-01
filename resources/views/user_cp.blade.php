@extends('navigation')

@section('user_content')
    <div id="content">

    </div>
        <div class="container">
            <div class="row row_pad">
            <div class="col-md-3 img-responsive">
                <div class="butg">
            <img class="img_border img-thumbnail avatar" align="right" id="avatar"  src="{{asset('img').'/'.$user->photo}}" alt="../img/grey.jpg">

                <div class="b">
                    <button type="button" class="ghost-button"  data-toggle="modal" data-target="#exampleModal">
                        Загрузить фото
                    </button>
                </div>
                </div>


        </div>


                <div class="col-md-9">

<div class="container cont_box">

    <div class="row">
        <div class="col-md-6 text-left pt-2">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="col-md-6 text-right pt-2">
            <h2>{{ $user->rating }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h id="tt"></h>

            <hr>

            <form method="POST" action="{{route('about.post')}}">
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input name='id' id="id" value="{{ $user->id }}" type="hidden">
            <p class="pt-2" id="text">{{ $user->about }}</p>
            <button id="bo" type="button">Open</button>
            <button id="bos" value="{{ $user->about }}" name="bos" type="button" style="display: none;">Save</button>
            </form>
        </div>

    </div>

</div>





                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
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
    <script>

    </script>
        @endsection
        @extends('footer')
