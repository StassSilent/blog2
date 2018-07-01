
@extends('navigation')

@section('user_content')

    <main role="main" class="container">
        <div class="chat-box pt-5">
            <div class="row">

                <div class="col-9 chat-list" >
                    <div class="row pt-5">
                        <div class="col-12" id="cc">
                                <input type="text" style=" height: 200px" class="form-control" placeholder="" name="complain" id="complain"  aria-label="сообщение" aria-describedby="basic-addon2">
                    </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-12">
                                    <button class="btn btn-primary" style="width: 100%" id="send_complain" type="button">Отправить</button>
                                </div>
                    </div>
                </div>
                            </div>
                        </div>




    </main>


@endsection
@include ('footer')









