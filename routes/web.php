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
// Auth::routes();

Route::get('/', function () {
    return view('loginpage');
});
Route::get('/login', function () {
    return view('loginpage');
});
Route::get('/register', function () {
    return view('registerpage');
});
Route::get('/import', function () {
    return view('welcome');
});
Route::post('/logout', function () {
    return view('loginpage');
});


Route::post('/import',[
    'as' => 'import',
    'uses' => 'ImportController@fnImport'
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewuploads', 'HomeController@viewuploads')->name('viewuploads');
Route::post('/registeraction', 'HomeController@registeraction')->name('registeraction');
Route::post('/loginaction', 'HomeController@loginaction')->name('loginaction');
Route::post('/logout', 'HomeController@logout')->name('logout');
