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


Route::get('/login', function () {
    return view('login');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/api/ressources', [CatalogueController::class, 'getAllRessources']);

