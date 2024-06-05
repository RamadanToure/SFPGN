<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongeController extends Controller
{
    public function index()
    {
        $conges = Conge::all();
        $employes = Employe::all();
        $demandesValidees = Conge::where('statut', 'Approuvé')->get();

        return view('form.conges.index', compact('conges', 'employes', 'demandesValidees'));
    }


    public function create()
    {
        $employes = Employe::all();
        return view('form.conges.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required',
            'approuve' => 'required|boolean',
        ]);

        Conge::create($request->all());

        return redirect()->route('conges.index')->with('success', 'Congé créé avec succès!');
    }

    public function show(Conge $conge)
    {
        $employes = Employe::all();
        return view('form.conges.show', compact('conge', 'employes'));
    }

    public function edit(Conge $conge)
    {
        $employes = Employe::all();
        return view('form.conges.edit', compact('conge', 'employes'));
    }

    public function update(Request $request, Conge $conge)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required',
            'approuve' => 'required|boolean',
        ]);

        $conge->update($request->all());

        return redirect()->route('conges.index')->with('success', 'Congé mis à jour avec succès!');
    }

    public function destroy(Conge $conge)
    {
        $conge->delete();

        return redirect()->route('conges.index')->with('success', 'Congé supprimé avec succès!');
    }

    public function demandesValides()
    {
        $demandesValidees = Conge::where('statut', 'Approuvé')->get();

        return view('form.conges.modals.valide', compact('demandesValidees'));
    }


    public function validerDemande(Conge $conge)
    {
        if (!Auth::user()->estAutorise()) {
            abort(403, 'Non autorisé');
        }

        if ($conge->statut !== 'En attente') {
            abort(403, 'Le congé n\'est pas en attente de validation.');
        }

        $conge->update([
            'statut' => 'Approuvé',
            'motif_approbation' => 'Congé approuvé.',
            'commentaires_approbateur' => 'Aucun commentaire.'
        ]);

        return redirect()->route('conges.index')->with('success', 'Demande de congé validée avec succès.');
    }

    public function demandesValidees()
    {
        $demandesValidees = Conge::where('statut', 'Approuvé')->get();

        return view('form.conges.modals.valide', compact('demandesValidees'));
    }
}
