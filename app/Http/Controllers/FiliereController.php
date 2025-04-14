<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        return Filiere::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Codefil' => 'required',
            'Libelle' => 'required',
        ]);
        return Filiere::create($validated);
    }

    public function show($id)
    {
        return Filiere::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $filiere = Filiere::findOrFail($id);
        $filiere->update($request->all());
        return $filiere;
    }

    public function destroy($id)
    {
        Filiere::destroy($id);
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}
