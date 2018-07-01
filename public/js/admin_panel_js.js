$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var x= $("#name").val();
    y=this.user_id;

    $('#update').on('click','.btn1', function () {
        // var c = $("#name1").val();
        var c=$(this).attr('value');//login
        var b=$(this).attr('id');//id
        console.log('c '+c + ' b: ' + b);
        $.ajax({
            url: '/admin_panelp',
            type: "POST",
            data: {id: $(this).attr('id')},
            dataType: 'html',
            success: function (msg) {
                $('#'+b).css('display','none');
                $('#'+c).css('display','inline');
            }
        });
    })

    $('#update').on('click','.un', function () {
        // var c = $("#name1").val();
        var c=$(this).attr('value');//id
        var b=$(this).attr('id');//login
        console.log('c '+c + ' b: ' + b);
        $.ajax({
            url: '/admin_panel1',
            type: "POST",
            data: {id: $(this).attr('value')},
            dataType: 'html',
            success: function (msg) {
                $('#'+b).css('display','none');
                $('#'+c).css('display','inline');
            }
        });
    })

    $('#update').on('click','.grant', function () {
        var c=$(this).attr('value');//login
        var b=$(this).attr('id');//id
        $.ajax({
            url: '/admin_panel2',
            type: "POST",
            data: {id: $(this).attr('name')},
            dataType: 'html',
            success: function (msg) {
                console.log(msg);

                $('#'+b).css('display','none');
                $('#'+c).css('display','inline');
            }
        });

    })

    $('#update').on('click','.ungrant', function () {
        var c=$(this).attr('value');//id
        var b=$(this).attr('id');//login
        $.ajax({
            url: '/admin_panel3',
            type: "POST",
            data: {id: $(this).attr('name')},
            dataType: 'html',
            success: function (msg) {
                console.log(msg);

                $('#'+b).css('display','none');
                $('#'+c).css('display','inline');
            }
        });

    })

    $('#update1').on('click','.btnFull', function () {
        $.ajax({
            url: '/admin_panel222',
            type: "POST",
            data: {idcomp: $(this).attr('id')},
            success: function (msg) {
               var compl =msg.length;
                document.getElementById('exampleModalCenterTitle').innerHTML = '';
                document.getElementById('complain_in_modal').innerHTML='';
                for (compl in msg) {
                    var c = document.createElement('div');
                    {
                        c.style = 'word-wrap:break-word;';
                        c.innerHTML =
                            msg[compl].complain;

                    }

                    var title = document.createElement('div');
                    {
                        title.innerHTML = msg[compl].name;
                    }

                }

                document.getElementById('complain_in_modal').appendChild(c);
                document.getElementById('exampleModalCenterTitle').appendChild(title);

            }
        });

    })



    $('#update1').on('click','.btnDelComp', function () {
        var idc = $(this).attr('id');
        $.ajax({
            url: '/admin_panel223',
            type: "POST",
            data: {idcomp: idc},
            success: function (msg) {
               console.log(msg);
                document.getElementById('c' + idc).style = 'display: none;';

            }
        });

    })

});

$('#find_block').click( function () {
    $.ajax({
        url: '/admin_panel11',
        type: "get",
        success: function (res) {
            var countOfUsers = res.length;
             console.log(res);

            if (countOfUsers==0){
                document.getElementById('update').innerHTML='';
                var item  = document.createElement('div');
                item.innerHTML = 'нет заблокированных пользователей';
                document.getElementById('update').appendChild(item);

            }
            else{
                document.getElementById('update').innerHTML='';
                for (countOfUsers in res) {
                    console.log(res[countOfUsers].name + ' ' + res[countOfUsers].photo);
                    var item  = document.createElement('tr');
                        console.log('status= ' + res[countOfUsers].block);
                        { item.innerHTML=
                            '<tr>\n' +
                            '<td scope="row" style="width: 50px;">'+res[countOfUsers].id+'</td>\n'+
                            '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/'+res[countOfUsers].photo+'" height="40px" ></a></td>\n'+
                            '<td style="width: 150px">'+res[countOfUsers].name+'</td>\n' +
                            '<td style="width: 150px">'+res[countOfUsers].email+'</td>\n'+
                            '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="'+res[countOfUsers].id+'" type="hidden">\n'+
                            '<input class="name1" id="name1" value="'+res[countOfUsers].name+'" type="hidden">\n'+
                            '<button id="'+res[countOfUsers].name+'" value="'+res[countOfUsers].id+'" class="btn btn-success un" name="un" type="button" >РБ</button>\n'+
                            '</td>\n' +
                            '\n' ;}
                    document.getElementById('update').appendChild(item);
                }
            }
        }
    })
});

$('#find_grant').click( function () {
    $.ajax({
        url: '/admin_panel12',
        type: "get",
        success: function (res) {
            var countOfUsers = res.length;
            console.log(res);

            if (countOfUsers==0){
                document.getElementById('update').innerHTML='';
                var item  = document.createElement('div');
                item.innerHTML = 'нет пользователей с привелегиями';
                document.getElementById('update').appendChild(item);

            }
            else{
                document.getElementById('update').innerHTML='';
                for (countOfUsers in res) {
                    console.log(res[countOfUsers].name + ' ' + res[countOfUsers].photo);
                    var item  = document.createElement('tr');
                    console.log('status= ' + res[countOfUsers].grant);
                    { item.innerHTML=
                        '<tr>\n' +
                        '<td scope="row" style="width: 50px;">'+res[countOfUsers].id+'</td>\n'+
                        '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/'+res[countOfUsers].photo+'" height="40px" ></a></td>\n'+
                        '<td style="width: 150px">'+res[countOfUsers].name+'</td>\n' +
                        '<td style="width: 150px">'+res[countOfUsers].email+'</td>\n'+
                        '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="'+res[countOfUsers].id+'" type="hidden">\n'+
                        '<input class="name1" id="name1" value="'+res[countOfUsers].name+'" type="hidden">\n'+
                        '<button id="'+res[countOfUsers].name+'" value="'+res[countOfUsers].id+'" class="btn btn-success un" name="un" type="button" >Разблокировать</button>\n'+
                        '</td>\n' +
                        '\n' ;}
                    document.getElementById('update').appendChild(item);
                }
            }
        }
    })
});









$('#find_user').on('input', function () {
    var inputFastSearchText = document.getElementById('find_user').value;
    // console.log(inputFastSearchText);
    //тут аякс запрос в котром мы передаем содержимое строки поиска
    $.ajax({
        type: 'post',
        url: '/find',
        data: {'search':inputFastSearchText},
        success: function (res) {
            console.log(res);
            //тут берем количество пользователей которое вернелосьнам из контроллера
            var countOfUsers = res.length;
            if (countOfUsers==0){
                //если 0 то просто очищаем список и пишем чтонибудь
                document.getElementById('update').innerHTML='';
                var item  = document.createElement('div');
                item.innerHTML = 'не найдено';
                document.getElementById('update').appendChild(item);
            }else{
                //елси не 0 то очизщаем список и выводим данные
                document.getElementById('update').innerHTML='';
                for (countOfUsers in res){
                    console.log(res[countOfUsers].name + ' ' + res[countOfUsers].photo);
                    //создаем елемент в которые выведим полученные данные


                    var item  = document.createElement('tr');
                        if((res[countOfUsers].block == 1)&&(res[countOfUsers].grant > 1)){
                            console.log('status= ' + res[countOfUsers].block);
                            { item.innerHTML=
                                // '<tbody>\n' +
                                '<tr>\n' +
                                '<td scope="row" style="width: 50px;">'+res[countOfUsers].id+'</td>\n'+
                                '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/'+res[countOfUsers].photo+'" height="40px" ></a></td>\n'+
                                '<td style="width: 150px">'+res[countOfUsers].name+'</td>\n' +
                                '<td style="width: 150px">'+res[countOfUsers].email+'</td>\n'+
                                '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="'+res[countOfUsers].id+'" type="hidden">\n'+
                                '<input class="name1" id="name1" value="'+res[countOfUsers].name+'" type="hidden">\n'+
                                '<button class="btn btn-danger btn1" id="'+res[countOfUsers].id+'" value="'+res[countOfUsers].name+'" type="button"  name="block-but" style="display: none;">Заблокировать</button>\n' +
                                '<button id="'+res[countOfUsers].name+'" value="'+res[countOfUsers].id+'" class="btn btn-success un" name="un" type="button" >Разблокировать</button>\n'+
                                '<button class="btn btn-info grant" id="grant'+res[countOfUsers].id+'" value="grant'+res[countOfUsers].name+'" type="button"  name="'+res[countOfUsers].id+'" style="display: none;">Назначить редактором</button>\n' +
                                '<button id="grant'+res[countOfUsers].name+'" value="grant'+res[countOfUsers].id+'" class="btn btn-info ungrant" name="'+res[countOfUsers].id+'" type="button" >Снять права редактора</button>\n'+
                                '</td>\n' +
                                '\n' ;}
                        // '</tbody>\n';}


                    }else if ((res[countOfUsers].block == 1)&&(res[countOfUsers].grant < 1)) {

                            console.log('status= ' + res[countOfUsers].block);
                            { item.innerHTML=
                                // '<tbody>\n' +
                                '<tr>\n' +
                                '<td scope="row" style="width: 50px;">'+res[countOfUsers].id+'</td>\n'+
                                '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/'+res[countOfUsers].photo+'" height="40px" ></a></td>\n'+
                                '<td style="width: 150px">'+res[countOfUsers].name+'</td>\n' +
                                '<td style="width: 150px">'+res[countOfUsers].email+'</td>\n'+
                                '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="'+res[countOfUsers].id+'" type="hidden">\n'+
                                '<input class="name1" id="name1" value="'+res[countOfUsers].name+'" type="hidden">\n'+
                                '<button class="btn btn-danger btn1" id="'+res[countOfUsers].id+'" value="'+res[countOfUsers].name+'" type="button"  name="block-but" style="display: none;">Заблокировать</button>\n' +
                                '<button id="'+res[countOfUsers].name+'" value="'+res[countOfUsers].id+'" class="btn btn-success un" name="un" type="button" >Разблокировать</button>\n'+
                                '<button class="btn btn-info grant" id="grant'+res[countOfUsers].id+'" value="grant'+res[countOfUsers].name+'" type="button"  name="'+res[countOfUsers].id+'"  >Назначить редактором</button>\n' +
                                '<button id="grant'+res[countOfUsers].name+'" value="grant'+res[countOfUsers].id+'" class="btn btn-info ungrant" name="'+res[countOfUsers].id+'" type="button" style="display: none;" >Снять права редактора</button>\n'+
                                '</td>\n' +
                                '\n' ;}
                        }

                        else if ((res[countOfUsers].block != 1)&&(res[countOfUsers].grant > 1))
                        {
                            console.log('status= ' + res[countOfUsers].block);
                            { item.innerHTML=
                                // '<tbody>\n' +
                                '<tr>\n' +
                                '<td scope="row" style="width: 50px;">'+res[countOfUsers].id+'</td>\n'+
                                '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/'+res[countOfUsers].photo+'" height="40px" ></a></td>\n'+
                                '<td style="width: 150px">'+res[countOfUsers].name+'</td>\n' +
                                '<td style="width: 150px">'+res[countOfUsers].email+'</td>\n'+
                                '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="'+res[countOfUsers].id+'" type="hidden">\n'+
                                '<input class="name1" id="name1" value="'+res[countOfUsers].name+'" type="hidden">\n'+
                                '<button class="btn btn-danger btn1" id="'+res[countOfUsers].id+'" value="'+res[countOfUsers].name+'" type="button"  name="block-but" >Заблокировать</button>\n' +
                                '<button id="'+res[countOfUsers].name+'" value="'+res[countOfUsers].id+'" class="btn btn-success un" name="un" type="button" style="display: none;" >Разблокировать</button>\n'+
                                '<button class="btn btn-info grant" id="grant'+res[countOfUsers].id+'" value="grant'+res[countOfUsers].name+'" type="button"  name="'+res[countOfUsers].id+'" style="display: none;" >Назначить редактором</button>\n' +
                                '<button id="grant'+res[countOfUsers].name+'" value="grant'+res[countOfUsers].id+'" class="btn btn-info ungrant" name="'+res[countOfUsers].id+'" type="button" >Снять права редактора</button>\n'+
                                '</td>\n' +
                                '\n' ;}
                        }
                        else  if ((res[countOfUsers].block != 1)&&(res[countOfUsers].grant < 1))
                        {
                            console.log('status= ' + res[countOfUsers].block);
                            item.innerHTML =
                                //     '<table>\n' +
                                // '<tbody>\n' +
                                '\n' +
                                '<td scope="row" style="width: 50px;">' + res[countOfUsers].id + '</td>\n' +
                                '<td style="width: 70px"><a class="pt-2 pb-2 table_a" href="/guest_cp/'+res[countOfUsers].id+'"><img class="data_img" src="http://portal.local/img/' + res[countOfUsers].photo + '" height="40px"></a></td>\n' +
                                '<td style="width: 150px">' + res[countOfUsers].name + '</td>\n' +
                                '<td style="width: 150px">' + res[countOfUsers].email + '</td>\n' +
                                '<td style="float: right;" class="mr-5">  <input class="name" id="name" value="' + res[countOfUsers].id + '" type="hidden">\n' +
                                '<input class="name1" id="name1" value="' + res[countOfUsers].name + '" type="hidden">\n' +
                                '<button class="btn btn-danger btn1" id="' + res[countOfUsers].id + '" value="' + res[countOfUsers].name + '" type="button"  name="block-but">Заблокировать</button>\n' +
                                '<button id="' + res[countOfUsers].name + '" value="' + res[countOfUsers].id + '" class="btn btn-success un" name="un" type="button" style="display: none;">Разблокировать</button>\n' +
                                '<button class="btn btn-info grant" id="grant' + res[countOfUsers].id + '" value="grant' + res[countOfUsers].name + '" type="button"  name="'+res[countOfUsers].id+'" >Назначить редактором</button>\n' +
                                '<button id="grant' + res[countOfUsers].name + '" value="grant' + res[countOfUsers].id + '" class="btn btn-info ungrant" name="'+res[countOfUsers].id+'" type="button" style="display: none;">Снять права редактора</button>\n'

                        }











                        //добавляем данные в конец элемента с id ms (это класс msgs-list)
                        document.getElementById('update').appendChild(item);
                    }
                }
            }

    })
});

