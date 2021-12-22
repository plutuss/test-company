<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => [
        'auth',
    ]
], function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('companies', CompanyController::class);
    Route::resource('clients', ClientController::class);
});
