<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function index()
    {
        $alertes = Alerte::all();

        return view('form.alertes.index', compact('alertes'));
    }

    public function create()
    {
        $alertes = Alerte::all();
        return view('form.alertes.create', compact('alertes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'date_alerte' => 'required|date',
        ]);

        Alerte::create($request->all());

        return redirect()->route('alertes.index')->with('success', 'Alerte créée avec succès!');
    }

    public function show(Alerte $alerte)
    {
        $alertes = Alerte::all();
        return view('form.alertes.show', compact('alerte'));
    }

    public function edit(Alerte $alerte)
    {
        $alertes = Alerte::all();
        return view('form.alertes.edit', compact('alerte'));
    }

    public function update(Request $request, Alerte $alerte)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'date_alerte' => 'required|date',
        ]);

        $alerte->update($request->all());

        return redirect()->route('alertes.index')->with('success', 'Alerte mise à jour avec succès!');
    }

    public function destroy(Alerte $alerte)
    {
        $alerte->delete();

        return redirect()->route('alertes.index')->with('success', 'Alerte supprimée avec succès!');
    }
}
