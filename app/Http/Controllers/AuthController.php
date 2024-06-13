<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
        ]);

        Utilisateur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'complement' => $request->complement,
        ]);

        return redirect()->route('compte')->with('msg', 'register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'mot_de_passe' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->mot_de_passe])) {
            $user = Auth::user();
            // if ($user->statut == 'off') {
            //     Auth::logout();
            //     return redirect()->route('compte')->with('msg', 'off');
            // }

            // Redirection en fonction du type d'utilisateur
            if ($user->type_utilisateur == 'admin') {
                return redirect('/admin');
            } else {
                return redirect()->route('index');
            }
        }

        return redirect()->route('compte')->with('msg', 'iuser');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('compte')->with('msg', 'logout');
    }

    public function adminDashboard()
    {
        $user = Auth::user();

        if ($user && $user->type_utilisateur == 'admin') {
            $utilisateurs = Utilisateur::all(); // Récupérer tous les utilisateurs
            return view('admindashboard', compact('utilisateurs'));
        }

        return redirect('/')->with('error', 'You do not have access to this section');
    }

    public function updateUser(Request $request, $id)
    {
        $user = Auth::user();

        if ($user && $user->type_utilisateur == 'admin') {
            $utilisateur = Utilisateur::find($id);

            if (!$utilisateur) {
                return redirect()->route('admin.dashboard')->with('error', 'Utilisateur non trouvé');
            }

            $utilisateur->update($request->all());

            return redirect()->route('admin.dashboard')->with('success', 'Utilisateur mis à jour avec succès');
        }

        return redirect('/')->with('error', 'You do not have access to this section');
    }

    public function deleteUser($id)
    {
        $user = Auth::user();

        if ($user && $user->type_utilisateur == 'admin') {
            $utilisateur = Utilisateur::find($id);

            if (!$utilisateur) {
                return redirect()->route('admin.dashboard')->with('error', 'Utilisateur non trouvé');
            }

            // Supprimer les réservations associées à l'utilisateur
            $utilisateur->reservations()->delete();

            // Supprimer l'utilisateur
            $utilisateur->delete();

            return redirect()->route('admin.dashboard')->with('success', 'Utilisateur supprimé avec succès');
        }

        return redirect('/')->with('error', 'You do not have access to this section');
    }
}