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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('items', 'ItemController');
/*
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('helloworld', 'App\Api\Controllers\HelloController@index');
  $api->post('auth', 'App\Api\Controllers\HelloController@authenticate');
  $api->get('auth', 'App\Api\Controllers\HelloController@user');
});
*/
