<?php

use App\Http\Controllers\CourrierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.auth-signin-cover');
});
Route::get('/index', function () {
    return view('home.dashboard-projects');
});
Route::get('/forgot', function () {
    return view('auth.auth-pass-reset-cover');
});
Route::get('/password', function () {
    return view('auth.auth-pass-change-cover');
});

Route::get('add-courrier', function () {
    return view('courriers.add-courrier');
});
Route::resource('courrier', CourrierController::class);


Route::fallback(function () {
    return response()->view('auth.auth-404-cover', [], 404);
});
