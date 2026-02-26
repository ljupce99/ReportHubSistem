<?php

use Illuminate\Support\Facades\Route;

// Smart root redirect
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role->canAccessAdmin()
            ? redirect('/admin')
            : redirect()->route('portal.index');
    }
    return redirect()->route('portal.login');
});
