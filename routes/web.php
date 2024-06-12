<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\ContactController;



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
Route::get('/api/ressources/filterOptions', [CatalogueController::class, 'getFilterOptions']);



Route::get('/api/ressource', [RessourceController::class, 'getRessource']);

//Contact//

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');

//Fin Contact//