<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/order', function () {
    return view('home.order');
});


Route::get('/home_index', 'NewController@do');
Route::get('/order/{id}', 'NewController@order');
Route::post('/add_pur_inv', [ 'as'=>'add_pur_inv', 'uses'=>'NewController@insert_order' ] );
Route::get('/findPrice',array('as' => 'findPrice','uses'=>'NewController@findPrice'));


// Route::resource('/add_order', 'SuperController@add_order');
// Route::resource('/update_order', 'SuperController@update_order');
// Route::resource('/update_order', 'SuperController@update_order');


Route::resource('/admin', 'SuperController@admin');

Route::resource('/table', 'SuperController@table');
Route::resource('/addtable', 'SuperController@add_table');
Route::resource('/delete_table', 'SuperController@delete_table');

Route::resource('/members', 'SuperController@members');
Route::resource('/add_members', 'SuperController@add_members');
Route::resource('/delete_members', 'SuperController@delete_members');

Route::resource('/payment_type', 'SuperController@payment_type');
Route::resource('/add_payment_type', 'SuperController@add_payment_type');
Route::resource('/delete_payment_type', 'SuperController@delete_payment_type');

Route::resource('/cuisine', 'SuperController@cuisine');
Route::resource('/add_cuisine', 'SuperController@add_cuisine');
Route::resource('/delete_cuisine', 'SuperController@delete_cuisine');
///////////////////////// Saleem /////////////////////
Route::resource('/dish_type', 'SuperController@dish_type');
Route::resource('/add_dish_type', 'SuperController@add_dish_type');
Route::resource('/delete_dish_type', 'SuperController@delete_dish_type');

Route::resource('/dish', 'SuperController@dish');
Route::resource('/add_dish', 'SuperController@add_dish');
Route::resource('/delete_dish', 'SuperController@delete_dish');

Route::resource('/kitchenHome', 'SuperController@kitchenHome');
Route::resource('/serverd_order', 'SuperController@serverd_order');
Route::resource('/processing_order', 'SuperController@processing_order');

Route::resource('/waiter', 'SuperController@waiter');
Route::resource('/add_waiter', 'SuperController@add_waiter');
Route::resource('/delete_waiter', 'SuperController@delete_waiter');



Route::get('user/login', 'UserController@index');
Route::post('/user_login', 'UserController@login');

////////////////////  Sharmila /////////////////////
Route::resource('/add_order', 'KitchenManagerController@add_order');
Route::resource('/update_order', 'KitchenManagerController@update_order');
Route::resource('/update_order_2', 'KitchenManagerController@update_order_2');
Route::resource('/man_kitchenHome', 'KitchenManagerController@man_kitchenHome');
Route::resource('/man_serverd_order', 'KitchenManagerController@man_serverd_order');
Route::resource('/man_processing_order', 'KitchenManagerController@man_processing_order');
Route::get('man_dashboard', 'KitchenManagerController@man_dashboard');

///////////////////////// Saleem /////////////////////


Route::resource('/Songs', 'SuperController@Songs');

Route::post('/add_songs', 'SuperController@add_songs');
Route::post('/delete_song', 'SuperController@delete_song');


Route::resource('/Story', 'SuperController@Story');
Route::post('/add_story', 'SuperController@add_story');
Route::post('/delete_story', 'SuperController@delete_story');

Route::resource('/Discuss', 'SuperController@Discuss');
Route::post('/add_discuss', 'SuperController@add_Discuss');
Route::post('/delete_discuss', 'SuperController@delete_Discuss');

Route::resource('/Local_Language', 'SuperController@Local_Language');
Route::post('/add_Local_Language', 'SuperController@add_Local_Language');
Route::post('/delete_Local_Language', 'SuperController@delete_Local_Language');


Route::resource('/Numbers', 'SuperController@Numbers');
Route::post('/add_Numbers', 'SuperController@add_Numbers');
Route::post('/delete_Numbers', 'SuperController@delete_Numbers');


Route::resource('/Events', 'SuperController@Events');
Route::post('/add_Events', 'SuperController@add_Events');
Route::post('/delete_Events', 'SuperController@delete_Events');


Route::resource('/Letters', 'SuperController@Letters');
Route::post('/add_Letters', 'SuperController@add_Letters');
Route::post('/delete_Letters', 'SuperController@delete_Letters');


Route::resource('/images', 'SuperController@images_add');
Route::post('/add_Images', 'SuperController@add_images');
Route::post('/delete_Images', 'SuperController@delete_images');

Route::resource('/audio', 'SuperController@Audio');
Route::post('/add_Audio', 'SuperController@add_Audio');
Route::post('/delete_Audio', 'SuperController@delete_Audio');

Route::resource('/Video', 'SuperController@Video');
Route::post('/add_Video', 'SuperController@add_Video');
Route::post('/delete_Video', 'SuperController@delete_Video');


Route::auth();

// Route::get('/home', 'HomeController@index');


Route::get('/tester', 'HomeController@tester');



Route::get('songs', 'PageController@songs');


/////////////////////// Api Controller ///////////////

Route::get('get_category', 'ApiController@get_category');
Route::get('get_Songs', 'ApiController@get_Songs');
Route::get('get_Story', 'ApiController@get_Story');
Route::get('get_Discuss', 'ApiController@get_Discuss');
Route::get('get_Local_Language', 'ApiController@get_Local_Language');
Route::get('get_Events', 'ApiController@get_Events');
Route::get('get_Numbers', 'ApiController@get_Numbers');
Route::get('get_Letters', 'ApiController@get_Letters');
Route::get('get_Images', 'ApiController@get_Images');
Route::get('get_Images_Tag/{id}', 'ApiController@get_Images_Tag');
Route::get('get_Audio', 'ApiController@get_Audio');
Route::get('get_Audio_Tag/{id}', 'ApiController@get_Audio_Tag');



/////////////////////// Api Controller ///////////////


/////////////////////// 10th Controller ///////////////



/////////////////////// 10th Controller ///////////////