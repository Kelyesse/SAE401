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

    public function getHomepageRessources()
    {
        // Fetch the latest resources
        $newBooks = Livre::orderBy('created_at', 'desc')->take(3)->get();
        $newMovies = Dvd::orderBy('created_at', 'desc')->take(3)->get();

        // Fetch the resources with the best notes
        $favoriteBooks = Livre::with('notes')->get()->sortByDesc(function ($book) {
            return $book->notes->avg('note');
        })->take(2);

        $favoriteMovies = Dvd::with('notes')->get()->sortByDesc(function ($movie) {
            return $movie->notes->avg('rating');
        })->take(2);

        // Fetch all books and movies
        $books = Livre::all();
        $movies = Dvd::all();

        // Combine all resources into a structured object
        $resources = [
            'new_ressources' => $newBooks->concat($newMovies),
            'favorite_ressources' => $favoriteBooks->concat($favoriteMovies),
            'books' => $books,
            'movies' => $movies,
        ];

        return response()->json($resources);
    }

}

