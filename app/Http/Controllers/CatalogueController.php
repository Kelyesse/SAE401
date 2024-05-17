<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        return view('catalogue');
    }

    public function getBooks()
    {
        $books = Livre::with(['auteur', 'editeur', 'langue'])->get();
        return response()->json($books);
    }
}
