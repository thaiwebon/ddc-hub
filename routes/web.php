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

// Route::get('/', function () {
// 	return view('authen.login');
//     // return view('welcome');
// });
Route::get('/', 'Authen\authenController@login')->name('index');
Route::get('/authen', 'Authen\authenController@Authen')->name('Authen');

Route::get('hub', 'hub\hubController@chkAuthen')->name('hub');

Route::get('service', 'Service\serviceController@GetData')->name('service');

Route::get('/clear-cache',function(){
	Artisan::call('cache:clear');
	return "Cache is cleared";
});

Route::get('/clear-view',function(){
	Artisan::call('view:clear');
	return "View is cleared";
});