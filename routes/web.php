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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// 必须认证邮箱
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');
Route::post('/contact/quick', 'HomeController@quick');

// Route::get('/login', 'UserController@login');
// Route::get('/home', 'HomeController@index')->name('home');

// 产品
Route::get('/products', 'ProductController@index');
Route::post('/products/search', 'ProductController@search');
Route::get('/products/search/{type}/{id}', 'ProductController@searchType');
Route::get('/products/clear_search/{string}', 'ProductController@searchClear');

// 咨询列表
Route::get('/inquiries', 'OrderController@inquiries');
Route::get('/inquiries/add/{id}', 'OrderController@add');
Route::get('/inquiries/delete/{id}', 'OrderController@delete');
Route::get('/inquiries/clear', 'OrderController@clear');


Route::get('/logout', 'UserController@logout');

// 联系方式
Route::get('/users/contact/create', 'UserController@contactCreate')->middleware('verified');
Route::post('/users/contact/store', 'UserController@contactStore')->middleware('verified');


Route::group(['middleware' => ['verified', 'state']], function () {

    // 咨询列表 - 邮件
    Route::post('/inquiries/send', 'OrderController@send');

    // 人员
    Route::get('/users/reset_password', 'UserController@resetPassword');
    Route::post('/users/save_password', 'UserController@savePassword');

    // 产品
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products/store', 'ProductController@store');
    Route::post('/products/img/store', 'ProductController@imgStore');

    Route::get('/conf/brands', 'ConfController@brands');
    Route::get('/conf/brands/create/{key}', 'ConfController@brandCreate');
    Route::get('/conf/brands/edit/{key}/{id}', 'ConfController@brandEdit');

    Route::get('/conf/categories', 'ConfController@categories');
    Route::get('/conf/create/{key}/{parent_id}', 'ConfController@create');
    Route::get('/conf/edit/{key}/{id}', 'ConfController@edit');

});


Route::get('/test', function() {
    $a=[1,2,3];
    $b = array_push($a, 3);
    // print_r($a);
    // Session::forget('inquiries');
    // echo(Auth::user()->email);
    // echo(config('mail.to.address'));
    // print_r(config('mail.to'));
    // $a = array_unique($a);

    // array_splice($a, 1,2);
    // print_r(session('inquiries'));
});















