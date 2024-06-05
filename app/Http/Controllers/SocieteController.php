<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $societes = Societe::all();
        return view('form.societe.index', compact('societes'));
    }

    public function create()
    {
        return view('form.societe.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'responsable' => 'required',
        ]);

        Societe::create($request->all());

        return redirect()->route('societes.index')->with('success', 'Société créée avec succès.');
    }

    public function show(Societe $societe)
    {
        return view('form.societe.show', compact('societe'));
    }

    public function edit(Societe $societe)
    {

        return view('form.societe.edit', compact('societe'));
    }

    public function update(Request $request, Societe $societe)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'responsable' => 'required',
        ]);

        $societe->update($request->all());

        return redirect()->route('societes.index')->with('success', 'Société mise à jour avec succès.');
    }

    public function destroy(Societe $societe)
    {
        $societe->delete();

        return redirect()->route('societes.index')->with('success', 'Société supprimée avec succès.');
    }
}
