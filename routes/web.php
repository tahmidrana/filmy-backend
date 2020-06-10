<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/films');

Route::resource('/films', 'FilmController', ['except'=> ['show']]);
Route::get('/films/{slug}/{id}', 'FilmController@show')->name('films.show');

Route::post("/films/{film_id}/comments", "CommentController@store")->name('comments.store');

Auth::routes();
