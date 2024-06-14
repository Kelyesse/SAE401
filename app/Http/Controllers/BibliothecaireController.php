<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Dvd;
use Illuminate\Support\Facades\Log;
use App\Models\Auteur;
use App\Models\Editeur;
use App\Models\Langue;


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

        $auteur = Auteur::firstOrCreate(['nom' => $request->auteur]);
        $editeur = Editeur::firstOrCreate(['nom' => $request->editeur]);


        $acteur = Auteur::firstOrCreate(['nom' => $request->acteur]);
        $realisateur = Editeur::firstOrCreate(['nom' => $request->realisateur]);

        // Conversion de la langue en ID
        $langueId = Langue::where('nom', $request->langue)->firstOrFail()->id;

        if ($request->type == 'livre') {
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
                'nombre_exemplaires' => $request->stock,
                'statut' => 'disponible', // statut par défaut
            ]);
        } else {
            $resource = new Dvd([
                'titre' => $request->titre,
                'genre' => $request->genre,
                'annee' => $request->annee,
                'description' => $request->description,
                'id_langue' => $langueId,
                'id_editeur' => $editeur->id,
                'acteur' => $acteur,
                'realisateur' => $realisateur,
                'ian' => $request->ian,
                'nombre_exemplaires' => $request->stock,
                'statut' => 'disponible', // statut par défaut
            ]);
        }

        $resource->save();
        return response()->json(['success' => true, 'resource' => $resource]);
    }





}