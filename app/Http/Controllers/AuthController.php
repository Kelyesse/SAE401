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
            'statut' => 'required|string',
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
            'type_utilisateur' => $request->statut,
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
            if ($user->statut == 'off') {
                Auth::logout();
                return redirect()->route('compte')->with('msg', 'off');
            }
            return redirect()->route('index');
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
}