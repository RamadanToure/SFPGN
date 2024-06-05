<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        $employes = Employe::all();
        return view('form.formations.index', compact('formations', 'employes'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('formations.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'lieu' => 'required',
            'formateur' => 'required',
            'employe_id' => 'required',
        ]);

        Formation::create($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation ajoutée avec succès.');
    }

    public function show(Formation $formation)
    {
        $employees = Employe::all();
        return view('form.formations.show', compact('formation', 'employes'));
    }

    public function edit(Formation $formation)
    {
        $employes = Employe::all();
        return view('formations.edit', compact('formation', 'employes'));
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'lieu' => 'required',
            'formateur' => 'required',
            'employe_id' => 'required',
        ]);

        $formation->update($request->all());

        return redirect()->route('formations.index')->with('success', 'Formation mise à jour avec succès.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('formations.index')->with('success', 'Formation supprimée avec succès.');
    }
}
