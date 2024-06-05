<?php

namespace App\Http\Controllers;

use App\Models\TypeContrat;
use Illuminate\Http\Request;

class TypeContratController extends Controller
{
    public function index()
    {
        $typeContrats = TypeContrat::all();
        return view('form.typeContrats.index', compact('typeContrats'));
    }

    public function create()
    {
        return view('form.typeContrats.create');
    }

    public function store(Request $request)
    {
        TypeContrat::create($request->all());
        return redirect()->route('typeContrats.index');
    }

    public function show(TypeContrat $typeContrat)
    {
        return view('form.typeContrats.show', compact('typeContrat'));
    }

    public function edit(TypeContrat $typeContrat)
    {
        return view('form.typeContrats.edit', compact('typeContrat'));
    }

    public function update(Request $request, TypeContrat $typeContrat)
    {
        $typeContrat->update($request->all());
        return redirect()->route('typeContrats.index');
    }

    public function destroy(TypeContrat $typeContrat)
    {
        $typeContrat->delete();
        return redirect()->route('typeContrats.index');
    }
}
