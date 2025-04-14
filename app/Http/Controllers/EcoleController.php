<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    public function index()
    {
        return Ecole::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Sigle' => 'required',
            'Designation' => 'required',
        ]);
        return Ecole::create($validated);
    }

    public function show($id)
    {
        return Ecole::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ecole = Ecole::findOrFail($id);
        $ecole->update($request->all());
        return $ecole;
    }

    public function destroy($id)
    {
        Ecole::destroy($id);
        return response()->json(['message' => 'Ecole Supprimée avec succès par Philemon']);
    }
}

