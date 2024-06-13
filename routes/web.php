<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BibliothecaireController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/catalogue', function () {
    return view('catalogue');
});

// Compte
Route::get('/compte', [AuthController::class, 'accountRedirection'])->name('compte');

Route::get('/reservations', function () {
    return view('reservations');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ressource
Route::get('/ressource', function () {
    return view('ressource');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/api/ressources', [CatalogueController::class, 'getAllRessources']);
Route::get('/api/ressources/search', [CatalogueController::class, 'searchRessources']);
Route::get('/api/ressources/filterOptions', [CatalogueController::class, 'getFilterOptions']);
Route::post('/api/ressources/add', [BibliothecaireController::class, 'addResource']);

Route::get('/api/checkSession', [AuthController::class, 'checkSession']);
Route::post('/api/add-review', [RessourceController::class, 'addReview']);

Route::get('/api/user', [AuthController::class, 'getUserInfos']);
Route::put('/api/user/{id}', [AuthController::class, 'updateUserInfos'])->name('user.update');

Route::get('/api/reservations', [ReservationController::class, 'getReservations']);
Route::get('/api/reservations/all', [ReservationController::class, 'getAllReservations']);

Route::get('/api/ressources/homepage', [CatalogueController::class, 'getHomepageRessources']);

Route::get('/api/ressource', [RessourceController::class, 'getRessource']);
Route::get('/ressource/getRatings', [RessourceController::class, 'getRatings']);

// Contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');

// Admin
Route::get('/admin', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
Route::put('/admin/update/{id}', [AuthController::class, 'updateUser'])->name('admin.update');
Route::delete('/admin/delete/{id}', [AuthController::class, 'deleteUser'])->name('admin.delete');

// Bibliothécaire
Route::get('/reservations-biblio', [BibliothecaireController::class, 'index'])->name('bibliothecaire.index');
Route::get('/api/reservations', [BibliothecaireController::class, 'getReservations']);