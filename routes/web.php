<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\RessourceController;


Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ressource', function () {
    return view('ressource');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/api/ressources', [CatalogueController::class, 'getAllRessources']);
Route::get('/api/ressources/search', [CatalogueController::class, 'searchRessources']);


Route::get('/api/ressources/homepage', [CatalogueController::class, 'getHomepageRessources']);


Route::get('/api/ressource', [RessourceController::class, 'getRessource']);

