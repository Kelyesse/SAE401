<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Dvd;
use Illuminate\Support\Facades\Log;



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
        if ($request->type == 'livre') {
            $resource = new Livre($request->all());
        } else {
            $resource = new Dvd($request->all());
        }
        $resource->save();
        return response()->json(['success' => true, 'resource' => $resource]);
    }
}