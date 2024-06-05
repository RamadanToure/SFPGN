<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = User::all();
        return view('form.utilisateur.index', ['utilisateurs' => $utilisateurs]);
    }

    public function create()
    {
        return view('form.utilisateur.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user with the validated data
        $user = User::create($validatedData);

        // Vérifier si le rôle 'user' existe, sinon le créer
        $roleUser = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Assigner le rôle à l'utilisateur
        $user->assignRole('user');

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès');
    }
    public function show($id)
    {
        $utilisateur = User::find($id);
        return view('form.utilisateur.show', ['utilisateur' => $utilisateur]);
    }

    public function edit($id)
    {
        $utilisateur = User::find($id);
        return view('form.utilisateur.edit', ['utilisateur' => $utilisateur]);
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Mettre à jour l'utilisateur avec les données validées
        User::where('id', $id)->update($validatedData);

        // Assigner ou mettre à jour le rôle de l'utilisateur (par exemple, 'user')
        $user = User::find($id);
        $user->assignRole('user');

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès');
    }
    public function destroy($id)
    {
        // Supprimer l'utilisateur
        User::destroy($id);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
