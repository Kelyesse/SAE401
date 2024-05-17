<?php

namespace App\Http\Controllers;

use App\Models\Livre;

class CatalogueController extends Controller
{
    public function getBooks()
    {
        $books = Livre::with(['auteur', 'editeur', 'langue'])->get();
        return response()->json($books);
    }
}
