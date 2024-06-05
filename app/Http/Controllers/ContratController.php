<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Employe;
use App\Models\TypeContrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index()
    {
        $employees = Employe::all();
        $typesContrat = TypeContrat::all();
        $contrats = Contrat::all();

        return view('form.contrats.index', compact('employees', 'typesContrat', 'contrats'));
    }

    public function create()
    {
        $employees = Employe::all();
        $typesContrat = TypeContrat::all();
        $contrats = Contrat::all();

        return view('form.contrats.create', compact('employees', 'typesContrat', 'contrats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id|unique:contrats,employe_id',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
        ]);

        Contrat::create($request->all());

        return redirect()->route('contrat.index')->with('success', 'Contrat ajouté avec succès');
    }

    public function show(Contrat $contrat)
    {
        $employees = Employe::all();
        $typesContrat = TypeContrat::all();
        $contrats = Contrat::all();

        return view('form.contrats.show', compact('employees', 'typesContrat', 'contrats'));
    }

    public function edit(Contrat $contrat)
    {
        $employees = Employe::all();
        $typesContrat = TypeContrat::all();
        return view('form.contrats.edit', compact('contrat', 'employees', 'typesContrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
        ]);

        $contrat->update($request->all());

        return redirect()->route('contrat.index')->with('success', 'Contrat mis à jour avec succès.');
    }

    public function historique(Contrat $contrat)
    {
        return view('contrats.historique', compact('contrat'));
    }

    public function destroy(Contrat $contrat)
    {
        $contrat->delete();

        return redirect()->route('contrat.index')->with('success', 'Contrat supprimé avec succès.');
    }
}
