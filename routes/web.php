<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('themes.main.page-team');
});
Route::get('/port', function () {
    return view('themes.main.page-portfolio');
});
