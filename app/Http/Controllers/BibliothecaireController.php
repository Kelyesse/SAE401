<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Dvd;
use Illuminate\Support\Facades\Log;
use App\Models\Auteur;
use App\Models\Casting;
use App\Models\Editeur;
use App\Models\Langue;
use App\Models\Realisateur;

class BibliothecaireController extends Controller
{
    public function index()
    {
        return view('reservations-biblio');
    }

    public function getReservations()
    {
        $reservations = Reservation::with(['utilisateur', 'ressource'])
            ->where('statut', 'confirmé')
            ->where('date_retour_prevue', '<', now())
            ->get();

        foreach ($reservations as $reservation) {
            Log::info($reservation->ressource->imgUrl); // Ajout de logs pour déboguer les URLs d'images
            Log::info($reservation->ressource->auteur); // Ajout de logs pour déboguer l'auteur
        }

        return response()->json($reservations);
    }

    public function getResources(Request $request)
    {
        $query = $request->input('query');
        $livres = Livre::where('titre', 'LIKE', "%{$query}%")->get();
        $dvds = Dvd::where('titre', 'LIKE', "%{$query}%")->get();
        $resources = $livres->merge($dvds);
        return response()->json($resources);
    }




    public function addResource(Request $request)
    {
        try {
            // Validation des données reçues
            $validatedData = $request->validate([
                'type' => 'required|string|in:livre,dvd',
                'titre' => 'required|string',
                'isbn' => 'required_if:type,livre|nullable|string',
                'ian' => 'required_if:type,dvd|nullable|string',
                'genre' => 'required|string|in:Action,Drame,Romance,Science-fiction,Mystère,Thriller,Fantaisie,Aventure,Horreur,Dystopie,Humour,Jeunesse,Biographie,Histoire,Sciences naturelles,Sciences sociales,Psychologie,Économie,Politique,Religion',
                'nombre_pages' => 'required_if:type,livre|nullable|integer',
                'duree' => 'required_if:type,dvd|nullable|integer',
                'annee' => 'required|integer',
                'description' => 'nullable|string',
                'langue' => 'required|string|in:fr,en,de,es,it',
                'auteur' => 'required_if:type,livre|nullable|string',
                'acteur' => 'required_if:type,dvd|nullable|string',
                'realisateur' => 'required_if:type,dvd|nullable|string',
                'editeur' => 'required_if:type,livre|nullable|string',
                'nombre_exemplaires' => 'required|integer',
                'imgUrl' => 'nullable|image|max:2048',
            ]);

            $imgUrl = $request->file('imgUrl')->store('', 'public');

            // Conversion de la langue en ID
            $langueId = Langue::where('code', $request->langue)->firstOrFail()->id;

            if ($request->type === 'livre') {
                // Récupération ou création de l'auteur
                $auteur = Auteur::firstOrCreate(['nom' => $request->auteur]);

                // Récupération ou création de l'éditeur
                $editeur = Editeur::firstOrCreate(['nom' => $request->editeur]);

                // Création du livre
                $resource = new Livre([
                    'titre' => $request->titre,
                    'genre' => $request->genre,
                    'annee' => $request->annee,
                    'description' => $request->description,
                    'id_langue' => $langueId,
                    'id_editeur' => $editeur->id,
                    'id_auteur' => $auteur->id,
                    'isbn' => $request->isbn,
                    'nombre_pages' => $request->nombre_pages,
                    'nombre_exemplaires' => $request->nombre_exemplaires,
                    'statut' => 'disponible', // statut par défaut
                    'imgUrl' => $imgUrl, // Chemin de l'image
                ]);
                // Enregistrement de la ressource dans la base de données
            } else {
                // Récupération ou création de l'acteur
                $acteur = Auteur::firstOrCreate(['nom' => $request->acteur]);

                // Récupération ou création du réalisateur
                $realisateur = Realisateur::firstOrCreate(['nom' => $request->realisateur]);

                // Création du DVD
                $resource = new Dvd([
                    'titre' => $request->titre,
                    'genre' => $request->genre,
                    'annee' => $request->annee,
                    'description' => $request->description,
                    'id_langue' => $langueId,
                    'sous_titres' => null,
                    'id_realisateur' => $realisateur->id,
                    'id_casting' => null,
                    'ian' => $request->ian,
                    'nombre_exemplaires' => $request->nombre_exemplaires,
                    'duree' => $request->duree,
                    'statut' => 'disponible', // statut par défaut
                    'imgUrl' => $imgUrl, // Chemin de l'image
                ]);

                // Enregistrement du DVD
            }

            $resource->save();


            return response()->json(['success' => true, 'resource' => $resource]);
        } catch (\Exception $e) {
            // Journalisation de l'erreur
            Log::error('Erreur lors de l\'ajout de la ressource : ' . $e->getMessage());

            // Retour d'une réponse JSON avec les détails de l'erreur
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }




}