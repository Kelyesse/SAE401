<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->type_utilisateur == 'admin') {
            return view('admin.dashboard');
        }

        return redirect('/')->with('error', 'You do not have access to this section');
    }

}