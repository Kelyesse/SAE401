<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Auteur;
use App\Models\Realisateur;
use App\Models\Note;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Throwable;


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
                $avis = Note::select('note.*', 'utilisateurs.prenom', 'utilisateurs.nom')
                    ->join('utilisateurs', 'note.id_utilisateur', '=', 'utilisateurs.id')
                    ->where('id_livre', $id)
                    ->get();
            } else {
                $avis = Note::select('note.*', 'utilisateurs.prenom', 'utilisateurs.nom')
                    ->join('utilisateurs', 'note.id_utilisateur', '=', 'utilisateurs.id')
                    ->where('id_dvd', $id)
                    ->get();
            }

            if ($avis->isEmpty()) {
                return response()->json([]);
            }

            return response()->json($avis);
        } catch (Throwable $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function addReview(Request $request)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'id_livre' => 'nullable|exists:livres,id',
            'id_dvd' => 'nullable|exists:dvds,id',
            'type_ressource' => 'required|in:livre,dvd',
            'note' => 'required|numeric|min:0|max:5',
            'date_note' => 'required|date',
        ]);
        $user = Auth::user();

        try {
            // Créer un nouvel avis dans la table note avec les données fournies
            $review = new Note();
            $review->commentaire = $request->input('commentaire');
            $review->id_utilisateur = $user->id;
            $review->id_livre = $request->input('id_livre');
            $review->id_dvd = $request->input('id_dvd');
            $review->type_ressource = $request->input('type_ressource');
            $review->note = $request->input('note');
            $review->date_note = $request->input('date_note');
            $review->save();


            // Répondre avec succès
            return response()->json(['request_data' => $request->all()], 200);
        } catch (Throwable $e) {
            // En cas d'erreur, répondre avec une erreur
            return response()->json(['error' => 'Failed to add review'], 500);
        }
    }
}

?>