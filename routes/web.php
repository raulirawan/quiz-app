<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::get('/pdf', 'Admin\BerkasController@pdf')->name('berkas.pdf');


Route::get('/', 'Auth\LoginController@showLoginForm')->name('form.login');

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware('admin', 'auth')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::resource('user', UserController::class);
        Route::resource('materi', MateriController::class);
        // Route::resource('jabatan', JabatanController::class);
        // Route::resource('unit', UnitController::class);

        // Route::get('/ganti-password', 'PasswordController@index')->name('ganti-password.admin.index');
        // Route::post('/ganti-password', 'PasswordController@updatePassword')->name('ganti-password.admin.update');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
