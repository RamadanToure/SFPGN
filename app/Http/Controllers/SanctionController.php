<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Sanction;
use Illuminate\Http\Request;

class SanctionController extends Controller
{
    public function index()
    {
        $sanctions = Sanction::with('employe')->get();
        $employes = Employe::all();
        return view('form.sanctions.index', compact('sanctions', 'employes'));
    }

    public function create()
    {
        $employes = Employe::all();

        return view('form.sanctions.create', compact('employes'));
    }

    public function store(Request $request)
    {
        // Validation logic
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type' => 'required',
            'motif' => 'required',
            'date_sanction' => 'required|date',
        ]);

        Sanction::create($request->all());

        return redirect()->route('sanctions.index')
                         ->with('success', 'Sanction enregistrée avec succès.');
    }

    public function show(Sanction $sanction)
    {
        $employes = Employe::all();
        return view('form.sanctions.show', compact('sanction', 'employes'));
    }

    public function edit(Sanction $sanction)
    {
        $employes = Employe::all();

        return view('form.sanctions.edit', compact('sanction', 'employes'));
    }

    public function update(Request $request, Sanction $sanction)
    {
        // Validation logic
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type' => 'required',
            'motif' => 'required',
            'date_sanction' => 'required|date',
        ]);

        $sanction->update($request->all());

        return redirect()->route('sanctions.index')
                         ->with('success', 'Sanction mise à jour avec succès.');
    }

    public function destroy(Sanction $sanction)
    {
        $sanction->delete();

        return redirect()->route('sanctions.index')
                         ->with('success', 'Sanction supprimée avec succès.');
    }

}
