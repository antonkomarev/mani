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

Route::get('/', 'Home\Action')->middleware(['guest', 'auth']);

Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/authenticate', 'Authenticate\Action')->name('authenticate');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'Home\Action')->name('home');
    Route::post('/logout', 'Logout\Action')->name('logout');
    Route::post('/new-address', 'NewAddress\Action')->name('new-address');
});
