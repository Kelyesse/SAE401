<?php

namespace App\Http\Controllers;

use App\Models\Livre;

class CatalogueController extends Controller
{
    public function getAllBooks()
    {
        $books = Livre::all();
        return response()->json($books);
    }
}

