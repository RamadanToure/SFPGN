<?php

namespace App\Http\Controllers;

use App\Models\BonPharmacie;
use App\Models\Employe;
use Illuminate\Http\Request;

class BonPharmacieController extends Controller
{
    public function index()
    {
        $employes = Employe::all();
        $bonsPharmacie = BonPharmacie::all();
        return view('form.bons_pharmacie.index', compact('bonsPharmacie', 'employes'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('form.bons_pharmacie.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_emission' => 'required|date',
            'montant' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        BonPharmacie::create($request->all());

        return redirect()->route('bons_pharmacie.index')->with('success', 'Le bon de pharmacie a été créé avec succès.');
    }

    public function edit(BonPharmacie $bonPharmacie)
    {
        $employes = Employe::all();
        return view('form.bons_pharmacie.edit', compact('bonPharmacie', 'employes'));
    }


    public function update(Request $request, BonPharmacie $bonPharmacie)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_emission' => 'required|date',
            'montant' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $bonPharmacie->update($request->all());

        return redirect()->route('bons_pharmacie.index')->with('success', 'Le bon de pharmacie a été mis à jour avec succès.');
    }

    public function destroy(BonPharmacie $bonPharmacie)
    {
        $bonPharmacie->delete();

        return redirect()->route('bons_pharmacie.index')->with('success', 'Le bon de pharmacie a été supprimé avec succès.');
    }

}
