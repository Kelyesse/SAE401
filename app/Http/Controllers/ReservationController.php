<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Utilisateur;
use Throwable;

class ReservationController extends Controller
{
    public function getReservations(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

        // Récupérer toutes les réservations de l'utilisateur
        $reservations = Reservation::where('id_utilisateur', $user->id)->get();
        // Initialiser un tableau pour stocker les réservations avec les détails du livre ou du DVD
        $reservationsWithDetails = [];

        // Pour chaque réservation, récupérer les détails du livre ou du DVD
        foreach ($reservations as $reservation) {
            if ($reservation->type_ressource === 'livre') {
                $livre = Livre::find($reservation->id_livre);
                if ($livre) {
                    $reservation->ressource_details = $livre;
                }
            } elseif ($reservation->type_ressource === 'dvd') {
                $dvd = Dvd::find($reservation->id_dvd);
                if ($dvd) {
                    $reservation->ressource_details = $dvd;
                }
            }

            // Ajouter la réservation avec les détails au tableau
            $reservationsWithDetails[] = $reservation;
        }

        // Retourner les réservations avec les détails du livre ou du DVD en tant que réponse JSON
        return response()->json($reservationsWithDetails);
    }

    public function getAllReservations(Request $request)
    {


        // Récupérer toutes les réservations de l'utilisateur
        $reservations = Reservation::all();

        $reservationsWithDetails = [];

        // Pour chaque réservation, récupérer les détails du livre ou du DVD
        foreach ($reservations as $reservation) {
            if ($reservation->type_ressource === 'livre') {
                $livre = Livre::find($reservation->id_livre);
                if ($livre) {
                    $reservation->ressource_details = $livre;
                }
            } elseif ($reservation->type_ressource === 'dvd') {
                $dvd = Dvd::find($reservation->id_dvd);
                if ($dvd) {
                    $reservation->ressource_details = $dvd;
                }
            }

            $utilisateur = Utilisateur::find($reservation->id_utilisateur);
            if ($utilisateur) {
                $reservation->utilisateur_details = $utilisateur;
            }


            // Ajouter la réservation avec les détails au tableau
            $reservationsWithDetails[] = $reservation;
        }

        // Retourner les réservations avec les détails du livre ou du DVD en tant que réponse JSON
        return response()->json($reservationsWithDetails);
    }

    public function makeReservation(Request $request)
    {
        $request->validate([
            'id_livre' => 'nullable|exists:livres,id',
            'id_dvd' => 'nullable|exists:dvds,id',
            'type_ressource' => 'required|in:livre,dvd',
            'date_debut' => 'required|date',
            'date_retour_prevue' => 'required|date',

        ]);
        $user = Auth::user();

        try {
            // Créer un nouvel avis dans la table note avec les données fournies
            $reservation = new Reservation();
            $reservation->id_utilisateur = $user->id;
            $reservation->id_livre = $request->input('id_livre');
            $reservation->id_dvd = $request->input('id_dvd');
            $reservation->type_ressource = $request->input('type_ressource');
            $reservation->date_debut = $request->input('date_debut');
            $reservation->date_retour_prevue = $request->input('date_retour_prevue');
            $reservation->statut = 'emprunté';

            $reservation->save();

            // Répondre avec succès
            return response()->json(['request_data' => $request->all()], 200);
        } catch (Throwable $e) {
            // En cas d'erreur, répondre avec une erreur
            return response()->json(['error' => 'Failed to add review'], 500);
        }
    }
}