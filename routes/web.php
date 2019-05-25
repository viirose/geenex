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
Route::get('/home', 'HomeController@index');
Route::post('/contact/quick', 'HomeController@quick');

// Route::get('/login', 'UserController@login');
// Route::get('/home', 'HomeController@index')->name('home'); 

// 产品
Route::get('/products', 'ProductController@index');
Route::post('/products/search', 'ProductController@search');
Route::get('/products/search/{type}/{id}', 'ProductController@searchType');
Route::get('/products/clear_search/{string}', 'ProductController@searchClear');
Route::get('/products/show/{id}', 'ProductController@show');

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
    Route::get('/users', 'UserController@index');
    Route::get('/users/lock/{id}', 'UserController@lock');
    Route::get('/users/unlock/{id}', 'UserController@unlock');
    Route::get('/users/reset_password', 'UserController@resetPassword');
    Route::post('/users/save_password', 'UserController@savePassword');

    // 产品
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products/store', 'ProductController@store');
    Route::post('/products/img/store', 'ProductController@imgStore');
    Route::get('/products/edit/{id}', 'ProductController@edit');
    Route::post('/products/update/{id}', 'ProductController@update');
    Route::get('/products/delete/{id}', 'ProductController@delete');

    // conf
    Route::get('/conf/brands', 'ConfController@brands');
    Route::post('/conf/brands/do', 'ConfController@brandDo');

    Route::get('/conf/categories', 'ConfController@categories');
    Route::post('/conf/categories/do', 'ConfController@categoryDo');

});


Route::get('/test', function() {
    return view('dropdown');
});















