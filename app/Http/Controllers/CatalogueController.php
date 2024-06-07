<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Dvd;


class CatalogueController extends Controller
{
    public function getAllRessources()
    {
        $books = Livre::all();
        $movies = Dvd::all();

        $resources = [
            ...$books,
            ...$movies,
        ];
        return response()->json($resources);
    }
}

