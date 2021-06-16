<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('pages.inicio');
//});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::post('/produto/novo', 'ProdutoController@novo')->name('produto.novo');
Route::get('/dashboard/login', 'Admin\LoginController@index')->name('dashboard.login');
Route::post('/produto/destroy/{id}','ProdutoController@destroy');

Route::post('/produto/search/{id}', 'ProdutoController@getProduto');

Route::get('upload-images', 'ImageController@index');
Route::post('upload-images', 'ImageController@storeImage')->name('images.store');

Route::group(['middleware'=> ['auth']], function(){

Route::get('logout', function(){Auth::logout();
return view('home');
});
});
Auth::routes();


