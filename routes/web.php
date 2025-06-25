<?php

use App\Http\Controllers\BureauController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CourrierController;
use App\Models\Bureau;
use App\Models\Categorie;
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
    $categorie = Categorie::all();
    $bureau = Bureau::all();
    return view('courriers.add-courrier', compact('categorie', 'bureau'));
});
Route::resource('courrier', CourrierController::class);
Route::resource('departement', BureauController::class);
Route::resource('categorie', CategorieController::class);


Route::fallback(function () {
    return response()->view('auth.auth-404-cover', [], 404);
});
