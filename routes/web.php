<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/films');

Route::resource('/films', 'FilmController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
