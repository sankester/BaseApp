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
    return view('welcome');
});

//Auth::routes();
// login
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

//reset pass
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset','Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('base')->group(function () {
    /**
     * Route User
     */
    Route::resource('users','BaseApp\UserController');
    /**
     * Route Portals
     */
    Route::resource('portals','BaseApp\PortalController');
    /**
     * Route Roles
     */
    Route::resource('roles','BaseApp\RoleController');
    /**
     * Route Navigation
     */
    Route::resource('navs','BaseApp\NavController',  ['except' => ['create', 'edit']]);
    Route::get('/navs/view/{portal_id}', 'BaseApp\NavController@view')->name('navs.view');
    Route::get('/navs/create/{portal_id}', 'BaseApp\NavController@create')->name('navs.create');
    Route::get('/navs/{portal_id}/{nav}/edit', 'BaseApp\NavController@edit')->name('navs.edit');
});

