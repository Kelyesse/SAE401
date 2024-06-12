<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Dvd;
use Illuminate\Http\Request;


class CatalogueController extends Controller
{
    public function getAllRessources()
    {
        $books = Livre::all();
        $movies = Dvd::all();

        $resources = $books->concat($movies);

        return response()->json($resources);
    }

    public function searchRessources(Request $request)
    {
        $searchQuery = $request->query('searchQuery');

        $books = Livre::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('titre', 'like', $searchQuery . '%');
        })->get();

        $movies = Dvd::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('titre', 'like', $searchQuery . '%');
        })->get();

        $resources = $books->concat($movies);

        return response()->json($resources);
    }
}

