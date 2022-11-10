<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'PagesController@index')->name('login');
Route::post('/login', 'PagesController@login')->name('login.post');

Route::get('/forgot-password', 'PagesController@forgotPassword')->name('login.forgot-password');
Route::post('/forgot-password', 'PagesController@forgotPasswordSend')->name('login.forgot-password-send');
Route::get('/forgot-password-resend', 'PagesController@forgotPasswordResend')->name('login.forgot-password-resend');
Route::get('/forgot-password-process', 'PagesController@forgotPasswordProcess')->name('login.forgot-password-process');
Route::post('/forgot-password-update', 'PagesController@forgotPasswordUpdate')->name('login.forgot-password-update');

Route::get('/email-verification', 'PagesController@emailVerification')->name('login.email-verification');
Route::get('/request-account-verification', 'PagesController@accountVerification')->name('login.request-account-verification');

Route::get('/password-verification', 'PagesController@passwordVerification')->name('login.password-verification');

Route::get('/regist', 'PagesController@regist')->name('login.regist');
Route::post('/regist', 'PagesController@registSend')->name('login.regist-send');

Route::get('/logout', 'PagesController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');
	Route::resource('roles', 'RoleController');
	Route::resource('users', 'UserController');
	Route::resource('profiles', 'ProfileController');
	// contents
	Route::resource('contents', 'ContentController');
	Route::get('contents/destroy-content-file/{id}', 'ContentController@destroyContentFile')->name('content.destroy-content-file');
	// end contents
});

// Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');