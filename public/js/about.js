document.getElementById('bo').onclick = function () {
    // var form=document.createElement("form");
    // form.setAttribute('method',"post");
    // form.setAttribute('action',"submit.php");
    document.getElementById('bo').style.display = 'none';
    var input = document.createElement('textarea');
    input.type=text;
    input.setAttribute('name',"sss");
    input.maxLength = 5000;
    input.cols = 50;
    input.id = 'sss';
    input.style.border = 'none';
    input.style.resize = 'none';
    input.style.boxShadow = '0px 0px 5px black';
    input.rows = 1;
    input.innerText = document.getElementById('text').innerText;
    document.getElementById('bos').style.display = 'inline';
    var oBody = document.getElementById("text");
    while (oBody.childNodes.length > 0) {
        oBody.removeChild(oBody.childNodes[0]);
    }
    oBody.appendChild(input);
    // form.appendChild(oBody);

    // var dd = document.getElementById('bo');
    // dd.hide();

};

//  document.getElementById('bos').onclick = function () {
// //
//
// //
//
//
//
//  }










$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // var x= $("#name").val();
    // y=this.user_id;
    $("#bos").click(function () {
        // var taskArray = new Array();
        // $("input[name=n]").each(function() {
        //   $m=taskArray.push($(this).val());
        // });

        var id = $("#id").val();
        var about = $("#sss").val();


        $.ajax({
            url: '/user_cp',
            type: "POST",
            data: {about: about, id:id},
            dataType: 'html',
            success: function (msg) {
                console.log(msg);
            }
        });
        var el = document.getElementById('text');
        var ta = document.getElementById('sss');
        el.innerText = ta.value;
        document.getElementById('bos').style.display = 'none';
        document.getElementById('bo').style.display = 'inline';
    });
});