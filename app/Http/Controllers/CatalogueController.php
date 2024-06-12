<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Editeur;
use App\Models\Auteur;
use App\Models\Acteur;
use App\Models\Realisateur;
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
        $books = collect();
        $movies = collect();

        $filters = [
            'searchQuery' => $request->query('searchQuery'),
            'genre' => $request->query('genre'),
            'statut' => $request->query('isAvailable') ? 'disponible' : '',
            'annee' => $request->query('annee'),
            'auteur' => $request->query('auteur'),
            'editeur' => $request->query('editeur'),
            'acteur' => $request->query('acteur'),
            'realisateur' => $request->query('realisateur')
        ];
        if (!$filters['acteur'] && !$filters['realisateur']) {
            $books = CatalogueController::getFilteredBooks($filters);
        }
        if (!$filters['auteur'] && !$filters['editeur']) {
            $movies = CatalogueController::getFilteredMovies($filters);
        }

        $resources = $books->concat($movies);

        return response()->json($resources);
    }

    function getFilteredBooks($filters)
    {
        return Livre::when($filters['searchQuery'], function ($query, $searchQuery) {
            return $query->where('titre', 'like', $searchQuery . '%');
        })->when($filters['genre'], function ($query, $genre) {
            return $query->where('genre', $genre);
        })->when($filters['statut'], function ($query, $statut) {
            return $query->where('statut', $statut);
        })->when($filters['annee'], function ($query, $annee) {
            return $query->where('annee', $annee);
        })->when($filters['auteur'], function ($query, $auteur) {
            return $query->whereHas('auteur', function ($q) use ($auteur) {
                $q->where('id', $auteur);
            });
        })->when($filters['editeur'], function ($query, $editeur) {
            return $query->whereHas('editeur', function ($q) use ($editeur) {
                $q->where('id', $editeur);
            });
        })->get();
    }

    function getFilteredMovies($filters)
    {
        return Dvd::when($filters['searchQuery'], function ($query, $searchQuery) {
            return $query->where('titre', 'like', $searchQuery . '%');
        })->when($filters['genre'], function ($query, $genre) {
            return $query->where('genre', $genre);
        })->when($filters['statut'], function ($query, $statut) {
            return $query->where('statut', $statut);
        })->when($filters['annee'], function ($query, $annee) {
            return $query->where('annee', $annee);
        })->when($filters['acteur'], function ($query, $acteur) {
            return $query->whereHas('castings', function ($q) use ($acteur) {
                $q->where('id_acteur', $acteur);
            });
        })->when($filters['realisateur'], function ($query, $realisateur) {
            return $query->whereHas('realisateur', function ($q) use ($realisateur) {
                $q->where('id', $realisateur);
            });
        })->get();
    }

    public function getFilterOptions()
    {
        $editeurs = Editeur::all();
        $auteurs = Auteur::all();
        $realisateurs = Realisateur::all();
        $acteurs = Acteur::all();
        $anneesLivres = Livre::select('annee')->distinct()->get();
        $anneesFilms = Dvd::select('annee')->distinct()->get();
        $annees = $anneesLivres->concat($anneesFilms)->pluck('annee')->unique()->sort()->values()->all();

        $filterOptions = [
            'editeurs' => $editeurs,
            'auteurs' => $auteurs,
            'realisateurs' => $realisateurs,
            'acteurs' => $acteurs,
            'annees' => $annees
        ];
        return response()->json($filterOptions);
    }
}

