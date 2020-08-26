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

/*Route::get('/', function () {return view('welcome');});*/

Route::get('/', 'PageController@index')->name('home');
Route::get('contact', 'PageController@contact')->name('contact');
Route::get('users', 'PageController@users');
Route::get('users/{id}', 'PageController@user')->where('id', '[1-9]+');
Route::get('{salutation}/{nom}', 'PageController@salutation')
    ->where(['salutation' => '[a-zA-Z]+', 'nom' => '[a-zA-Z]+[0-9]']);