<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Dvd;
use App\Models\Utilisateur;

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
}