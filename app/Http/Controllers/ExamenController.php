<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    
    public function index()
    {
        return Examen::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Codexam' => 'required',
            'Libellexam' => 'required',
        ]);
        return Examen::create($validated);
    }

    public function show($id)
    {
        return Examen::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $examen = Examen::findOrFail($id);
        $examen->update($request->all());
        return $examen;
    }

    public function destroy($id)
    {
        Examen::destroy($id);
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}
