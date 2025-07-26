<?php

use App\Http\Controllers\BureauController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Models\Bureau;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('index', [CustomAuthController::class, 'dashboard']);
Route::post('custom-login', [CustomAuthController::class, 'customLogin']);
Route::get('logout', [CustomAuthController::class, 'signOut']);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->intended('index');
    }
    return view('auth.auth-signin-cover');
});

Route::get('/test-mail', function () {
    Mail::raw('Test de mail depuis Laravel', function ($message) {
        $message->to('theodoreyapi@gmail.com')
                ->subject('Test Laravel');
    });

    return 'Mail envoyé';
});


// Route::get('/index', function () {
//     return view('home.dashboard-projects');
// });
Route::get('/forgot', function () {
    return view('auth.auth-pass-reset-cover');
});
Route::get('/password', function () {
    return view('auth.auth-pass-change-cover');
});

Route::get('add-courrier', function () {
    if (!Auth::check()) {
        return view('auth.auth-signin-cover');
    }

    $categorie = Categorie::all();
    $bureau = Bureau::all();
    return view('courriers.add-courrier', compact('categorie', 'bureau'));
});
Route::resource('userss', UserController::class);
Route::resource('courrier', CourrierController::class);
Route::post('users/{id}', [UserController::class, 'updateUser']);
Route::post('note/{id}', [CourrierController::class, 'updateNote']);
Route::get('signe/{id}', [CourrierController::class, 'signer']);
Route::resource('departement', BureauController::class);
Route::resource('categorie', CategorieController::class);


Route::fallback(function () {
    return response()->view('auth.auth-404-cover', [], 404);
});
