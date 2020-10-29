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
	Route::prefix('users')->group(function(){
		Route::get('/Service', 'Service\serviceController@chkAuthen')->name('ServiceForm');
		Route::post('/ViewService', 'Service\serviceController@ViewService')->name('ServiceView');
		Route::post('/InsertService', 'Service\serviceController@InsertService')->name('ServiceInsert');
		Route::post('/DeleteService', 'Service\serviceController@DeleteService')->name('ServiceDelete');
		Route::post('/UpdateScore', 'Service\serviceController@UpdateScore')->name('ServiceScore');
	});

	Route::prefix('admin')->group(function(){
		Route::get('/AdminViewService/{value}', 'Service\serviceController@AdminViewService')->name('ServiceAdminView');
		Route::post('/FindDataService', 'Service\serviceController@FindDataService')->name('ServiceFindData');
		Route::post('/ReciveService', 'Service\serviceController@ReciveService')->name('ServiceRecive');
	});
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

Route::get('/config-clear',function(){
	Artisan::call('config:clear');
	return "Config is cleared";
});

Route::get('/config-cache',function(){
	Artisan::call('config:cache');
	return "Config and Cache is cleared";
});

Route::get('/clear-view',function(){
	Artisan::call('view:clear');
	return "View is cleared";
});

