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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lsb_view', ['as' => 'lsb', 'uses' => 'LSBController@encodeLSB']);
Route::post('/lsb_encode', ['as' => 'lsb_encode', 'uses' => 'LSBController@LSBAnalyzeEncode']);
Route::post('/lsb_decode', ['as' => 'lsb_decode', 'uses' => 'LSBController@LSBAnalyzeDecode']);

Route::get('/lsb_crypt_view', ['as' => 'lsbCrypt', 'uses' => 'LSBCryptController@encodeLSBCrypt']);
Route::post('/lsb_encode_crypt', ['as' => 'lsb_encode_crypt', 'uses' => 'LSBCryptController@LSBEncodeCrypt']);
Route::post('/lsb_decode_crypt', ['as' => 'lsb_decode_crypt', 'uses' => 'LSBCryptController@LSBDecodeCrypt']);
