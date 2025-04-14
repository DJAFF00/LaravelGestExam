<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class EtudiantController extends Controller
{
    public function index()
    {
        return Etudiant::with(['ecole', 'filiere'])->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
            'ecole_id' => 'required|exists:ecoles,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $etudiant =Etudiant::create([
            'Nom' => $request->nom,
            'Prenom' => $request->prenom,
            'Sexe' => $request->sexe,
            'Adresse' => $request->adresse,
            'Tel' => $request->tel,
            'ecole_id' => $request->ecole_id,
            'filiere_id' => $request->filiere_id,
        ]);
        

        return response()->json([
            'message' => 'Créer avec succès',
            'etudiant' => $etudiant,

        ]);    }

    public function show($id)
    {
        return Etudiant::with(['ecole', 'filiere'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return $etudiant;
    }

    public function destroy($id)
    {
        Etudiant::destroy($id);
        return response()->json(['message' => 'Supprimé avec succès']);
    }
}
