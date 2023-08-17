<?php

use App\Http\Controllers\QuestionController;
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
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::resource('user', UserController::class);
        Route::resource('materi', MateriController::class);
        Route::resource('quiz', QuizController::class);

        Route::prefix('quiz')->group(function () {
            Route::get('{quiz}/question-list', 'QuestionController@index')->name('question.index');
            Route::get('{quiz}/question-create', 'QuestionController@create')->name('question.create');
            Route::post('{quiz}/question-store', 'QuestionController@store')->name('question.store');
            Route::get('{quiz}/question-edit/{question}', 'QuestionController@edit')->name('question.edit');
            Route::put('{quiz}/question-update/{question}', 'QuestionController@update')->name('question.update');
            Route::delete('{quiz}/question-delete/{question}', 'QuestionController@destroy')->name('question.destroy');
        });

        Route::get('/leaderboard/{quiz_id}', 'LeaderboardController@getLeaderBoard');

        // Route::get('/ganti-password', 'PasswordController@index')->name('ganti-password.admin.index');
        // Route::post('/ganti-password', 'PasswordController@updatePassword')->name('ganti-password.admin.update');
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/materi', 'HomeController@materi')->name('materi');
        Route::get('/materi/{materi_id}', 'HomeController@materiDetail')->name('materi.detail');
        Route::get('/quiz', 'HomeController@quiz')->name('quiz');
        Route::get('/quiz/{quiz_id}', 'HomeController@quizDetail')->name('quiz.detail');
        Route::get('/quiz/{quiz_id}', 'HomeController@quizDetail')->name('quiz.detail');

        Route::post('/submit/answer/', 'HomeController@submitAnswer')->name('submitAnswer');
        Route::get('/nilai/{quiz_id}/{user_id}', 'HomeController@nilai')->name('nilai');
        Route::get('/leaderboard/{quiz_id}', 'HomeController@leaderboard')->name('leaderboard');
    });

Auth::routes();
