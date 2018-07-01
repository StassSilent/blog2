<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|



*/


Route::get('/', "IndexController@getIndex");
Route::get('/index', "IndexController@getIndex");
//Route::get('/login', function (){
//return  view('/auth/login');
//});



Route::get('/reg', function (){
    return  view('/reg');

});
Route::get('/register', function (){
    return  view('/register');

});

Route::post('/postcomplain', "messageController@postcomplain");


Route::get('/postcomplain', function (){
    return  view('/postcomplain');

});


Route::get('/category', "categoryController@category");
Route::get('/category/{id}',"categoryController@getDetails");

Route::post('/create/add',"categoryController@store" );

Route::get('/forum',"ForumController@getForum" );


//Route::get('/category', "categoryController@category");
//Route::get('/category/{id}',"categoryController@getDetails");
//Route::get('/create',"categoryController@create" );
//Route::post('/create/add',"categoryController@store" );
//Route::get('/forum',"ForumController@getForum" );


Route::post('/reg','UserCpController@user_store');
//Route::get('/reg', 'UserCpController@reg');

Auth::routes();

Route::group(['middleware'=>'block'], function () {
    Route::get('/block_message',"IndexController@message");
});

Route::post('guest_cp/{id}','UserCpController@post_mes');
Route::get('guest_cp/{id}','UserCpController@guest');



Route::group(['middleware'=>'admin'], function () {
    Route::get('/admin_panel','AdminController@panel');
    Route::get('/admin_panel11','AdminController@block1');
    Route::get('/admin_panel12','AdminController@grant');
    Route::post('/admin_panel222','AdminController@fullcomp');
    Route::post('/admin_panel223','AdminController@deleteComp');
    Route::post('/find','AdminController@find');
    Route::post('/admin_panelp','AdminController@block1')->name('block');
    Route::post('/admin_panel1','AdminController@unblock')->name('test.post1');
    Route::post('/admin_panel2','AdminController@grant')->name('test.post2');
    Route::post('/admin_panel3','AdminController@ungrant')->name('test.post3');


});


Route::group(['middleware'=>'redactor'], function () {
Route::get('/redactor',"RedactorController@getRed" );
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create',"categoryController@create" );
    Route::get('/dialog',"messageController@get_dialog" );
    Route::post('/dialog',"messageController@post_dialog" );
    Route::post('/dialog1',"messageController@deldialog" );
    Route::get('/messages/{id}',"messageController@post_dialog" );
    Route::post('/messages',"messageController@post_messages" );
    Route::get('/{user}', 'UserCpController@get_info');
Route::post('/modal', 'UserCpController@avaUpload');
Route::post('/user_cp','UserCpController@store_about')->name('about.post');


});





//Route::post('/regm', 'AuthController@auth');

//Route::get('/{user}/', 'UserCpController@get_info');





