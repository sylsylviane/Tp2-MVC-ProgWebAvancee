<?php
use App\Routes\Route;

Route::get('/home', 'HomeController@index');

Route::dispatch();

?>