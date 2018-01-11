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

Route::get('index',function () {
    return view('index');
});

Route::get('home',function () {
    return view('home');
})->name('home');

Route::get('register',function () {
    return view('register');
})->name('register');

Route::get('menu',function () {
    return view('menu');
})->name('menu');

Route::get('geocomplete',function () {
    return view('geocomplete');
})->name('geocomplete');

Route::get('checkin',function () {
    return view('checkin');
})->name('checkin');
