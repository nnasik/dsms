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
Route::get('/permission/create', 'PermissionController@createPermissions');
Route::get('/user/create', 'UserController@createUser');


Route::group(['middleware' => ['auth']], function(){
    
    Route::post('/user/update', 'UserController@updateUser');
    Route::post('/user/permission/add', 'UserController@addPermision');
    Route::post('/user/permission/rem', 'UserController@remPermision');

    // Profile
    Route::get('/home', 'ProfileController@profile')->name('Profile');
    Route::get('/profile', 'ProfileController@profile')->name('Profile');

    Route::post('/profile/update', 'ProfileController@updateProfile');
    Route::post('/profile/updatedp', 'ProfileController@updateDP');
    Route::post('/profile/updatesign', 'ProfileController@updateSign');
    Route::post('/profile/updatepassword', 'ProfileController@updatePassword');
    

    // Advance Program
    Route::get('/ap', 'AdvanceProgramController@index')->name('Advance Programmes');
    Route::get('/ap/new', 'AdvanceProgramController@new')->name('New Advance Programme');
    Route::get('/ap/header/{id}', 'AdvanceProgramController@header')->name('Header');
    Route::get('/ap/footer/{id}', 'AdvanceProgramController@footer')->name('Footer');
    Route::get('/ap/table/{id}', 'AdvanceProgramController@table')->name('Table');
    Route::get('/ap/calendar/{id}', 'AdvanceProgramController@calendar')->name('Calendar');
    Route::get('/ap/view/{id}', 'AdvanceProgramController@view')->name('Advance Programme');

    Route::get('/ap/newf', 'AdvanceProgramController@newf')->name('New Advance Programme');

    Route::post('/ap/add', 'AdvanceProgramController@add');
    Route::post('/ap/updateheader', 'AdvanceProgramController@update_header');
    Route::post('/ap/updatefooter', 'AdvanceProgramController@update_footer');
    Route::post('/ap/updatetable', 'AdvanceProgramController@update_table');
    Route::post('/ap/updatecalendar', 'AdvanceProgramController@update_calendar');

    
    // User Account
    Route::get('/users', 'UserController@users')->name('Users');
    Route::get('/user/view/{id}', 'UserController@view')->name('User');

    Route::post('/user/update', 'UserController@updateUser');
    Route::post('/user/updatedp', 'UserController@updateDP');
    Route::post('/user/updatesign', 'UserController@updateSign');
    Route::post('/user/resetpassword', 'UserController@resetPassword');
    Route::post('/user/addpermission', 'UserController@addPermission');
    Route::post('/user/rempermission', 'UserController@remPermission');

});