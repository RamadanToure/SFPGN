<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\HeuresSupplementaires;
use Illuminate\Http\Request;

class HeuresSupplementairesController extends Controller
{
    public function index()
    {
        $employes = Employe::all();
        $heuresSupplementaires = HeuresSupplementaires::all();
        return view('form.heures_supplementaires.index', compact('heuresSupplementaires', 'employes'));
    }


    public function create()
    {
        $employes = Employe::all();
        $heuresSupplementaires = HeuresSupplementaires::all();
        return view('form.heures_supplementaires.create', compact('employes','heuresSupplementaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'nombre_heures' => 'required|integer',
            'date_heure_supplementaire' => 'required|date',
        ]);

        HeuresSupplementaires::create($request->all());

        return redirect()->route('heures_supplementaires.index')->with('success', 'Heures supplémentaires enregistrées avec succès.');
    }


    public function show($id)
    {
        $employes = Employe::all();
        $heureSupplementaire = HeuresSupplementaires::findOrFail($id);
        return view('form.heures_supplementaires.show', compact('heureSupplementaire', 'employes'));
    }

    public function edit($id)
    {
        $employes = Employe::all();
        $heureSupplementaire = HeuresSupplementaires::findOrFail($id);
        return view('form.heures_supplementaires.edit', compact('heureSupplementaire', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'nombre_heures' => 'required|integer',
            'date_heure_supplementaire' => 'required|date',
        ]);

        $heureSupplementaire = HeuresSupplementaires::findOrFail($id);
        $heureSupplementaire->update($request->all());

        return redirect()->route('heures_supplementaires.index')->with('success', 'Heures supplémentaires mises à jour avec succès.');
    }

    public function destroy($id)
    {
        $heureSupplementaire = HeuresSupplementaires::findOrFail($id);
        $heureSupplementaire->delete();

        return redirect()->route('heures_supplementaires.index')->with('success', 'Heures supplémentaires supprimées avec succès.');
    }
}
