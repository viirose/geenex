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
Route::get('/privacy', 'HomeController@privacy');
Route::get('/terms', 'HomeController@terms');
Route::get('/profile', 'HomeController@profile');


// Route::get('/login', 'UserController@login');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/conf/category_info/{id}', 'ConfController@categoryInfo');

// 产品
Route::get('/products/share/{id}/{token}', 'ProductController@share');

Route::get('/logout', 'UserController@logout');

Route::get('/accounts/create', 'UserController@accountCreate');
Route::post('/accounts/store', 'UserController@accountStore');

// 联系方式
Route::get('/users/contact/create/{id?}', 'UserController@contactCreate');
Route::post('/users/contact/store/{id?}', 'UserController@contactStore');


// 产品
Route::get('/products', 'ProductController@jump');
Route::get('/products/spares', 'ProductController@index');
Route::post('/products/search', 'ProductController@search');
Route::get('/products/search/{type}/{id}', 'ProductController@searchType');
Route::get('/products/clear_search/{string}', 'ProductController@searchClear');


Route::group(['middleware' => ['verified', 'state']], function () {
    Route::post('/contact/quick', 'HomeController@quick');
    // 咨询列表 - 邮件
    Route::post('/inquiries/send', 'OrderController@send');
    Route::get('/inquiries/show/{id?}', 'OrderController@show');
    Route::get('/inquiries', 'OrderController@inquiries');
    Route::get('/inquiries/add/{id}', 'OrderController@add');
    Route::get('/inquiries/delete/{id}', 'OrderController@delete');
    Route::get('/inquiries/clear', 'OrderController@clear');

    // 人员
    Route::get('/users', 'UserController@index');
    Route::get('/users/lock/{id}', 'UserController@lock');
    Route::get('/users/unlock/{id}', 'UserController@unlock');
    Route::get('/users/reset_password', 'UserController@resetPassword');
    Route::post('/users/save_password', 'UserController@savePassword');
    Route::get('/users/create', 'UserController@create');
    Route::post('/users/store', 'UserController@store');
    Route::get('/users/spare_cancel/{id}', 'UserController@spareCancel');
    Route::get('/users/spare_give/{id}', 'UserController@spareGive');
    Route::post('/users/search', 'UserController@search');
    Route::get('/users/show/{id?}', 'UserController@show');
    Route::get('/users/delete/{id}', 'UserController@delete');
    Route::get('/users/limit/{id}/{conf_id}', 'UserController@limit');
    Route::get('/users/unlimit/{id}/{conf_id}', 'UserController@unlimit');
    Route::get('/users/edit/{id}', 'UserController@edit'); # edit
    Route::post('/users/update/{id}', 'UserController@update');
    Route::get('/users/contact/edit/{id?}', 'UserController@contactEdit');
    Route::post('/users/contact/update/{id?}', 'UserController@contactUpdate');
    Route::get('/users/set_admin/{id}', 'UserController@setAdmin'); # admin
    Route::get('/users/remove_admin/{id}', 'UserController@removeAdmin');

    // // 产品
    // Route::get('/products', 'ProductController@jump');
    // Route::get('/products/spares', 'ProductController@index');
    // Route::post('/products/search', 'ProductController@search');
    // Route::get('/products/search/{type}/{id}', 'ProductController@searchType');
    // Route::get('/products/clear_search/{string}', 'ProductController@searchClear');

    Route::get('/products/create', 'ProductController@create');
    Route::post('/products/store', 'ProductController@store');
    Route::post('/products/img/store', 'ProductController@imgStore');
    Route::get('/products/edit/{id}', 'ProductController@edit');
    Route::post('/products/update/{id}', 'ProductController@update');
    Route::get('/products/delete/{id}', 'ProductController@delete');
    Route::get('/products/show/{id}', 'ProductController@show');
    Route::post('/products/send', 'ProductController@send');

    // conf
    Route::get('/conf/brands', 'ConfController@brands');
    Route::post('/conf/brands/do', 'ConfController@brandDo');
    Route::get('/conf/categories', 'ConfController@categories');
    Route::post('/conf/categories/do', 'ConfController@categoryDo');
    Route::get('/conf/categories/delete/{id}', 'ConfController@delete');
    Route::get('/conf/brands/delete/{id}', 'ConfController@deleteBrand');
    // Traffic
    Route::get('/conf/lock', 'ConfController@visLock');
    Route::get('/conf/unlock', 'ConfController@visFree');

});


Route::get('/test', function() {
    // abort('403');
    return view('pages.privacy');
});















