
@extends('navigation')
@section('user_content')
<div class="rbackground">
<div class="chat-box">
    <div class="row">
        <div class="col-3  dialog-list">
            <div class="row dialog-item">
                <div class="col-3 delete_padding">ava</div>
                <div class="col-9 delete_padding">b</div>
            </div>
            <div class="row dialog-item">
                <div class="col-3 delete_padding">ava</div>
                <div class="col-9 delete_padding">b</div>
            </div>
        </div>
        <div class="col-9 chat-list">
            <div class="row msgs">
                <ui id="msg-list" class="slider">
                    <li id="msg-item">asdas</li>
                    <li id="msg-item" class="me">asdasd safasd faf </li>
                    <li id="msg-item">asdas</li>
                    <li id="msg-item">asdas</li>
                </ui>
            </div>
            <div class="row controlls">
                <div class="col-12 delete_padding">
                    <div class="input-group justify-content-between">
                        <input type="text" class="form-control" placeholder="сообщение" aria-label="сообщение" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


    setInterval(function() {
        $.ajax({
            url: '/chatGetMsgItem',
            type: "get",
            contentType: 'html',
            success: function (msg) {
                console.log(msg[0].msg);
                var item  = document.createElement('li');
                item.id = 'msg-item';
                item.className = 'me';
                item.innerHTML = msg[0].msg;
                document.getElementById('msg-list').appendChild(item);
            }
        })
    }, 3000);


</script>
</div>
@endsection
@extends('footer')