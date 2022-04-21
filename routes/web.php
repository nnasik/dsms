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

Route::get('/sysinit', 'PermissionController@createPermissions');


Route::group(['middleware' => ['auth']], function () {

    // Profile
    Route::get('/', 'ProfileController@profile')->name('Profile');
    Route::get('/home', 'ProfileController@profile')->name('Profile');
    Route::get('/profile', 'ProfileController@profile')->name('Profile');

    Route::post('/profile/update', 'ProfileController@updateProfile');
    Route::post('/profile/updatedp', 'ProfileController@updateDP');
    Route::post('/profile/updatesign', 'ProfileController@updateSign');
    Route::post('/profile/updatepassword', 'ProfileController@updatePassword');


    // Advance Program
    Route::get('/ap', 'AdvanceProgramViewsController@index')->name('Advance Programmes');
    Route::get('/ap/new', 'AdvanceProgramViewsController@new')->name('New Advance Programme');
    Route::get('/ap/header/{id}', 'AdvanceProgramViewsController@header')->name('Header');
    Route::get('/ap/footer/{id}', 'AdvanceProgramViewsController@footer')->name('Footer');
    Route::get('/ap/table/{id}', 'AdvanceProgramViewsController@table')->name('Table');
    Route::get('/ap/calendar/{id}', 'AdvanceProgramViewsController@calendar')->name('Calendar');
    Route::get('/ap/view/{id}', 'AdvanceProgramViewsController@view')->name('Advance Programme');


    Route::get('/ap/approved', 'AdvanceProgramViewsController@approvedAPs')->name('Approved Advance Programmes');
    Route::get('/ap/tobeapproved', 'AdvanceProgramViewsController@toBeApprovedAPs')->name('Advance Programmes to be Approved');
    Route::get('/ap/toberecommended', 'AdvanceProgramViewsController@toBeRecommended')->name('Advance Programmes to be Recommended');
    Route::get('/ap/tobechecked', 'AdvanceProgramViewsController@toBeChecked')->name('Advance Programmes to be Checked');
    Route::get('/ap/notsubmitted', 'AdvanceProgramViewsController@notSubmitted')->name('Advance Programmes Not Submitted');

    // Advance Program Updates
    Route::post('/ap/add', 'AdvanceProgramController@add');
    Route::post('/ap/updateheader', 'AdvanceProgramController@update_header');
    Route::post('/ap/updatefooter', 'AdvanceProgramController@update_footer');
    Route::post('/ap/updatetable', 'AdvanceProgramController@update_table');
    Route::post('/ap/updatecalendar', 'AdvanceProgramController@update_calendar');

    // Advance Program Action Controller
    Route::post('/ap/submit', 'AdvanceProgramActionController@submit');
    Route::post('/ap/checkdate', 'AdvanceProgramActionController@checkDate');
    Route::post('/ap/adddatenote', 'AdvanceProgramActionController@addDateNote');
    Route::post('/ap/checkap', 'AdvanceProgramActionController@checkAP');
    Route::post('/ap/recommendap', 'AdvanceProgramActionController@recommendAP');
    Route::post('/ap/approveap', 'AdvanceProgramActionController@approveAP');

    // User Account
    Route::get('/users', 'UserController@users')->name('Users');
    Route::get('/user/view/{id}', 'UserController@view')->name('User');

    Route::post('/user/update', 'UserController@updateUser');
    Route::post('/user/updatedp', 'UserController@updateDP');
    Route::post('/user/updatesign', 'UserController@updateSign');
    Route::post('/user/resetpassword', 'UserController@resetPassword');
    Route::post('/user/addpermission', 'UserController@addPermission');
    Route::post('/user/rempermission', 'UserController@remPermission');
    Route::post('/user/activateuser', 'UserController@activateUser');
});
