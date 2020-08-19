<?php

use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;
use App\User;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath' ]
], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes(['reset' => false, 'confirm' => false]);

    Route::middleware(['auth'])->group(function () {
        Route::resource('/users', 'UserController', ['except' => ['store', 'create']]);
        Route::resource('/change_pass', 'UserChangePasswordController')
            ->parameters(['change_pass' => 'user'])
            ->only('edit', 'update');
        Route::resource('/tasks', 'TaskController');
        Route::resource('/taskstatuses', 'TaskStatusController', ['except' => ['show']]);
        Route::resource('/tags', 'TagController', ['except' => ['show', 'update', 'edit']]);
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
