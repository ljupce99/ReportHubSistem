<?php

use Illuminate\Support\Facades\Route;

// Smart root redirect
Route::get('/', function () {
    return redirect('/admin');
});
