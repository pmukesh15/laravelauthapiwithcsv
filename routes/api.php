<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::GET('/importCsv',[
    'as' => 'importCsv',
    'uses' => 'Apis\ImportCsvController@importCsv'
]);

Route::post('/signin',[
    'as' => 'signin',
    'uses' => 'Apis\CustomAuthController@signin'
]);

Route::post('/signup',[
    'as' => 'signup',
    'uses' => 'Apis\CustomAuthController@signup'
]);

Route::get('/loadimports',[
    'as' => 'loadimports',
    'uses' => 'Apis\CustomAuthController@loadimports'
]);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
