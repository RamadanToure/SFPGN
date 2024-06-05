<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\HeuresTravail;
use Illuminate\Http\Request;

class HeuresTravailController extends Controller
{
    /**
     * Affiche une liste des heures de travail.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        $heuresTravail = HeuresTravail::all();
        return view('form.heures-travail.index', compact('heuresTravail', 'employes'));
    }

    /**
     * Affiche le formulaire de création des heures de travail.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        return view('form.heures-travail.create', compact('employes'));
    }

    /**
     * Stocke une nouvelle ressource dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'heure_entree' => 'required|date',
            'heure_sortie' => 'nullable|date',
        ]);

        HeuresTravail::create($request->all());

        return redirect()->route('heures-travail.index')
                        ->with('success', 'Heures de travail enregistrées avec succès.');
    }

    /**
     * Affiche la ressource spécifiée.
     *
     * @param  \App\Models\HeuresTravail  $heuresTravail
     * @return \Illuminate\Http\Response
     */
    public function show(HeuresTravail $heuresTravail)
    {
        $employes = Employe::all();
        return view('form.heures-travail.show', compact('heuresTravail', 'empoyes'));
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     *
     * @param  \App\Models\HeuresTravail  $heuresTravail
     * @return \Illuminate\Http\Response
     */
    public function edit(HeuresTravail $heuresTravail)
    {
        return view('form.heures-travail.edit', compact('heuresTravail'));
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeuresTravail  $heuresTravail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeuresTravail $heuresTravail)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'heure_entree' => 'required|date',
            'heure_sortie' => 'nullable|date',
        ]);

        $heuresTravail->update($request->all());

        return redirect()->route('heures-travail.index')
                        ->with('success', 'Heures de travail mises à jour avec succès.');
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  \App\Models\HeuresTravail  $heuresTravail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeuresTravail $heuresTravail)
    {
        $heuresTravail->delete();

        return redirect()->route('heures-travail.index')
                        ->with('success', 'Heures de travail supprimées avec succès.');
    }
}
