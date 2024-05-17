<?php

use App\Http\Controllers\CatalogueController;
use Illuminate\Support\Facades\Route;

Route::get('/api/books', [CatalogueController::class, 'getBooks']);
