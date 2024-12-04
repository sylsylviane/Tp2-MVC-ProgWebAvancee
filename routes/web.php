<?php
use App\Routes\Route;

Route::get('/home', 'HomeController@index');
Route::get('/film', 'FilmController@index');
Route::get('/film/show', 'FilmController@show');
Route::get('/film/create', 'FilmController@create');
Route::post('/film/create', 'FilmController@store');
Route::get('/film/edit', 'FilmController@edit');
Route::post('/film/delete', 'FilmController@delete');

Route::dispatch();

?>