<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;


Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/catalogue', function () {
    return view('catalogue');
});


Route::get('/ressources', function () {
    return view('ressource');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/api/books', [CatalogueController::class, 'getAllBooks']);

Route::get('/api/ressource', [RessourceController::class, 'getRessource']);