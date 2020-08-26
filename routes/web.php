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
	return view('authen.login');
    // return view('welcome');
});

Route::get('/hub', function () {
    return view('hub.hub');
})->name('hub');

Route::get('authen', 'Authen\authenController@Authen')->name('Authen');