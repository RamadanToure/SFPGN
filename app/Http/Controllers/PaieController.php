<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Employe;
use App\Models\Paie;
use App\Models\Prime;
use Illuminate\Http\Request;

class PaieController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');
        $searchDate = $request->input('date');

        $query = Paie::query();

        if ($searchQuery) {
            $query->where('mois_paie', 'like', '%' . $searchQuery . '%')
                  ->orWhere('salaire_base', 'like', '%' . $searchQuery . '%')
                  ->orWhereHas('employe', function($query) use ($searchQuery) {
                      $query->where('nom', 'like', '%' . $searchQuery . '%');
                  });
        }

        if ($searchDate) {
            $query->whereDate('mois_paie', '=', $searchDate);
        }

        $paies = $query->get();
        $employes = Employe::all();


        return view('form.paies.index', compact('paies', 'employes', 'searchQuery', 'searchDate'));
    }




    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        // Rediriger vers la méthode index avec le paramètre de recherche
        return redirect()->route('paies.index', ['search' => $searchQuery]);
    }

    public function create()
    {
        $employes = Employe::all();
        return view('form.paies.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id|unique:paies,employe_id',
            'mois_paie' => 'required|date',
            'salaire_base' => 'required|numeric',
        ]);

        Paie::create($request->all());

        return redirect()->route('paies.index')->with('success', 'La paie a été créée avec succès.');
    }

    public function show(Paie $paie)
    {
        return view('form.paies.show', compact('paie'));
    }

    public function edit(Paie $paie)
    {
        $employees = Employe::all();
        return view('form.paies.edit', compact('paie', 'employees'));
    }


    public function update(Request $request, Paie $paie)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'mois_paie' => 'required|date',
            'salaire_base' => 'required|numeric',
        ]);

        $paie->update($request->all());

        return redirect()->route('paies.index')->with('success', 'La paie a été mise à jour avec succès.');
    }

    public function destroy(Paie $paie)
    {
        $paie->delete();

        return redirect()->route('paies.index')->with('success', 'La paie a été supprimée avec succès.');
    }


    public function primes($employeId)
    {
        $employe = Employe::findOrFail($employeId);
        $primes = Prime::where('employe_id', $employeId)->get();

        return view('form.paies.primes', compact('employe', 'primes'));
    }

    public function absences($employeId)
    {
        $employe = Employe::findOrFail($employeId);
        $absences = Absence::where('employe_id', $employeId)->get();

        return view('form.paies.absences', compact('employe', 'absences'));
    }
}
