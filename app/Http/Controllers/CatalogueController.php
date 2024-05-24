<?php

namespace App\Http\Controllers;

use App\Models\Livre; // Assurez-vous d'importer le modèle Livre si ce n'est pas déjà fait

class CatalogueController extends Controller
{
    public function getAllBooks()
    {
        $books = Livre::all();
        return response()->json($books);
    }
}

