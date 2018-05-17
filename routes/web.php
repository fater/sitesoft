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

// Home page
Route::get('', 'HomeController@index')->name('home');

// Роуты авторизации и регистрации
Auth::routes();

// Страница об успешном окончании регистрации
Route::get('success', 'HomeController@success')->name('success');

// Добавление сообщения
Route::post('', 'HomeController@postAddMessage')->name('add_message');