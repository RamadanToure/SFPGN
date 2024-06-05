<?php

namespace App\Http\Controllers;

use App\Models\Recrutement;
use Illuminate\Http\Request;

class RecrutementController extends Controller
{
    public function index()
    {
        $recrutements = Recrutement::all();
        return view('form.recrutement.index', compact('recrutements'));
    }

    public function create()
    {
        return view('form.recrutement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'poste' => 'required',
            'description' => 'required',
            'date_limite' => 'required|date',
        ]);

        Recrutement::create([
            'poste' => $request->poste,
            'description' => $request->description,
            'date_limite' => $request->date_limite,
        ]);

        return redirect()->route('recrutement.index')->with('success', 'Recrutement ajouté avec succès.');
    }

    public function edit(Recrutement $recrutement)
    {
        return view('form.recrutement.edit', compact('recrutement'));
    }

    public function update(Request $request, Recrutement $recrutement)
    {
        $request->validate([
            'poste' => 'required',
            'description' => 'required',
            'date_limite' => 'required|date',
        ]);

        $recrutement->update([
            'poste' => $request->poste,
            'description' => $request->description,
            'date_limite' => $request->date_limite,
        ]);

        return redirect()->route('recrutement.index')->with('success', 'Recrutement mis à jour avec succès.');
    }

    public function destroy(Recrutement $recrutement)
    {
        $recrutement->delete();
        return redirect()->route('recrutement.index')->with('success', 'Recrutement supprimé avec succès.');
    }
}
