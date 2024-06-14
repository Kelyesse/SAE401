<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;


class EditeurController extends Controller
{
    public function getEditeurs()
    {
        $editeurs = Editeur::all();
        return response()->json($editeurs);
    }
}

