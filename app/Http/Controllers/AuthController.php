<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{
     public function register(Request $request)
    {
        Log::info('Register method called.');

        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'complement' => 'nullable|string|max:255',
        ]);

        Log::info('Validation passed.');

        $utilisateur = Utilisateur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'code_postal' => $request->code_postal,
            'complement' => $request->complement,
        ]);

        Log::info('User created: ', ['user' => $utilisateur]);

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

            // Redirection en fonction du type d'utilisateur
            if ($user->type_utilisateur == 'admin') {
                return redirect('/admin');
            } elseif ($user->type_utilisateur == 'utilisateur') {
                return redirect('/reservations');
            } elseif ($user->type_utilisateur == 'bibliothecaire') {
                return redirect('/reservations-biblio');
            }
        }

        return redirect()->route('compte')->with('msg', 'iuser');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('compte')->with('msg', 'logout');
    }


    public function checkSession()
    {
        $user = Auth::user();
        return response()->json($user);
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
    public function accountRedirection()
    {
        $user = Auth::user();
        if ($user && $user->type_utilisateur) {
            if ($user->type_utilisateur == 'utilisateur') {
                return redirect('/reservations');
            } elseif ($user->type_utilisateur == 'bibliothecaire') {
                return redirect('/reservations-biblio');
            }
        } else {
            return view('compte');
        }
    }

    public function getUserInfos()
    {
        $user = Auth::user();
        return response()->json($user);
    }
    public function updateUserInfos(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'prenom' => 'nullable|string|max:255',
            'nom' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:utilisateurs,email,' . $user->id,
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:10',
            'complement' => 'nullable|string|max:255',
            'mot_de_passe' => 'nullable|string|min:8|confirmed',
        ]);

        // Mettez à jour les champs fournis dans la requête
        $utilisateur = Utilisateur::find($id);


        $utilisateur->update($request->except(['mot_de_passe']));

        if ($request->filled('mot_de_passe')) {
            $utilisateur->mot_de_passe = Hash::make($request->mot_de_passe);
            $utilisateur->save();
        }

        return response()->json(['success' => 'Informations mises à jour avec succès'], 200);
    }
}