<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Auteur;
use App\Models\Realisateur;
use App\Models\Note;

class RessourceController extends Controller
{
    public function getRessource(Request $request)
    {
        $isbn = $request->query('isbn');
        $ian = $request->query('ian');

        if ($isbn) {
            $ressource = Livre::with('auteur')->where('isbn', $isbn)->first();
        } else {
            $ressource = Dvd::with('realisateur')->where('ian', $ian)->first();
        }

        // Si la ressource est un livre, utilisez la relation avec l'auteur pour obtenir le nom
        if ($ressource instanceof Livre) {
            $nomAuteur = $ressource->auteur->nom ?? null;
            $prenomAuteur = $ressource->auteur->prenom ?? null;
            $nomCompletAuteur = $prenomAuteur . ' ' . $nomAuteur;
            $ressource->setAttribute('auteur_nom_complet', $nomCompletAuteur);
        }
        // Si la ressource est un DVD, utilisez la relation avec le réalisateur pour obtenir le nom
        elseif ($ressource instanceof Dvd) {
            $nomRealisateur = $ressource->realisateur->nom ?? null;
            $prenomRealisateur = $ressource->realisateur->prenom ?? null;
            $nomCompletRealisateur = $prenomRealisateur . ' ' . $nomRealisateur;
            $ressource->setAttribute('realisateur_nom_complet', $nomCompletRealisateur);
        }

        return response()->json($ressource);
    }

    public function getRatings(Request $request)
    {
        $isbn = $request->query('isbn');
        $ian = $request->query('ian');
        $id = $request->query('id');

        try {
            if ($isbn) {
                $avis = Note::where('id_livre', $id)->get(); // Utilisez `get()` pour obtenir un tableau
            } else {
                $avis = Note::where('id_dvd', $id)->get();
            }

            if ($avis->isEmpty()) {
                return response()->json([]);
            }

            return response()->json($avis);
        } catch (Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}

