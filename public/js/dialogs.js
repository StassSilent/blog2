$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#send_message').click( function () {
        var c = $("#id_dialog").val();
        var b =$("#id_to").val();
        var d=$("#message").val();
        console.log('c ' + c + ' b: ' + b);
        $.ajax({
            url: '/messages',
            type: "POST",
            data: {id_dialog: c, id_to: b, mes:d},
            dataType: 'html',
            success: function (msg) {
console.log(msg);
            }
        });
    })

    $('#msg-list').on('click','.bcross', function () {
        var d=$(this).attr('value');
        $.ajax({
            url: '/dialog1',
            type: "POST",
            data: {id: d},
            dataType: 'html',
            success: function (msg) {
                $('#'+d).css('display','none');
            }
        });
    })

    $('#send_complain').click( function () {
        var c = $("#complain").val();
        $.ajax({
            url: '/postcomplain',
            type: "POST",
            data: {compl: c},
            dataType: 'html',
            success: function (msg) {
                // document.getElementById('complain').innerHTML='';
            }
        });
    })
})

