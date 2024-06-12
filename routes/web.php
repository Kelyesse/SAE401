<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/catalogue', function () {
    return view('catalogue');
}) ;

//Compte
Route::get('/compte', function () {
    return view('compte');
})->name('compte');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Fin compte

Route::get('/ressource', function () {
    return view('ressource');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/api/ressources', [CatalogueController::class, 'getAllRessources']);
Route::get('/api/ressources/search', [CatalogueController::class, 'searchRessources']);
Route::get('/api/ressources/filterOptions', [CatalogueController::class, 'getFilterOptions']);



Route::get('/api/ressource', [RessourceController::class, 'getRessource']);