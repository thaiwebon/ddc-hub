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

Route::get('/hub', 'Hub\hubController@chkAuthen')->name('hub');

Route::prefix('service')->group(function(){
	Route::get('/FormService', 'Service\serviceController@chkAuthen')->name('service.form');
});

Route::prefix('mailgothai')->group(function(){

});

Route::prefix('ad')->group(function(){

});

Route::prefix('vm')->group(function(){

});

Route::prefix('vpn')->group(function(){

});

Route::get('/logout', 'Logout\logoutController@LogOut')->name('LogOut');

Route::get('/clear-cache',function(){
	Artisan::call('cache:clear');
	return "Cache is cleared";
});

Route::get('/clear-view',function(){
	Artisan::call('view:clear');
	return "View is cleared";
});