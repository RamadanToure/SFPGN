<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\TypeContrat;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Facades\View;

class EmployeController extends Controller
{
    public function index(Request $request)
    {
        $typesContrat = TypeContrat::all();

        // Récupérer les filtres de recherche depuis la requête
        $search_nom = $request->input('nom');
        $search_fonction = $request->input('fonction');
        $search_telephone = $request->input('telephone');

        // Construire la requête de recherche
        $query = Employe::query();

        if ($search_nom) {
            $query->where('nom', 'like', '%' . $search_nom . '%');
        }
        if ($search_fonction) {
            $query->where('fonction', 'like', '%' . $search_fonction . '%');
        }

        if ($search_telephone) {
            $query->where('telephone', 'like', '%' . $search_telephone . '%');
        }

        $employes = $query->get();

        return view('form.employes.index', compact('employes', 'typesContrat'));
    }

    public function create()
    {
        return view('form.employes.create');
    }

    public function store(Request $request)
    {
        $this->validateEmployee($request);

        $imageName = $this->uploadPhoto($request);

        Employe::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'fonction' => $request->fonction,
            'type_contrat_id' => $request->type_contrat_id,
            'date_debut' => $request->date_debut,
            'photo' => $imageName,
        ]);

        return redirect()->route('employes.index')->with('success', 'Employé ajouté avec succès');
    }

    public function show(Employe $employe)
    {
        return view('form.employes.show', compact('employe'));
    }

    public function edit(Employe $employe)
    {
        return view('form.employes.edit', compact('employe'));
    }

    public function update(Request $request, Employe $employe)
    {
        $this->validateEmployee($request);

        $this->handleFileUpload($request, $employe);

        $employe->update($request->except('photo'));

        return redirect()->route('employes.index')->with('success', 'Employé mis à jour avec succès');
    }

    public function destroy(Employe $employe)
    {
        // Supprimer les enregistrements associés dans la table conges
        $employe->conges()->delete();

        // Supprimer la photo
        $this->deletePhoto($employe);

        // Supprimer l'employé
        $employe->delete();

        return redirect()->route('employes.index')->with('success', 'Employé supprimé avec succès');
    }

    public function exportPDF()
    {
        // Vérifiez si la vue Blade existe
        if (!View::exists('form.employes.pdf')) {
            return abort(404);
        }

        // Récupérez les employés
        $employes = Employe::all();

        // Ajoutez un titre au PDF
        $pdfTitle = 'Liste des Employés';

        // Chargez la vue dans le PDF
        $pdf = DomPDFPDF::loadView('form.employes.pdf', compact('employes'))
                   ->setPaper('a4')  // Choisissez le format de papier (a4, letter, etc.)
                   ->setOptions(['title' => $pdfTitle]); // Ajoutez un titre au PDF

        // Téléchargez le fichier PDF avec un nom de fichier spécifique
        return $pdf->download('employes.pdf');
    }
    // Méthodes privées pour une meilleure organisation du code

    private function validateEmployee(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'fonction' => 'required',
            'type_contrat_id' => 'nullable|exists:type_contrats,id',
            'date_debut' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ], [
            'photo.image' => 'Le champ photo doit être une image.',
            'photo.mimes' => 'Le champ photo doit être un fichier de type : jpeg, png, jpg, gif.',
            'photo.max' => 'Le champ photo ne doit pas dépasser 2048 kilo-octets (2 Mo).',
        ]);
    }




    private function uploadPhoto(Request $request)
    {
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('public/images/employes', $imageName);
            return 'images/employes/' . $imageName;
        }
        return null;
    }

    private function handleFileUpload(Request $request, Employe $employe)
    {
        if ($request->hasFile('photo')) {
            $oldPhotoPath = $this->getPhotoPath($employe);

            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('public/images/employes', $imageName);

            $employe->update(['photo' => 'images/employes/' . $imageName]);

            // Supprimer l'ancienne photo après la mise à jour
            if ($oldPhotoPath) {
                Storage::delete($oldPhotoPath);
            }
        }
    }

    private function getPhotoPath($employe)
    {
        return $employe->photo ? 'public/' . $employe->photo : null;
    }

    private function deletePhoto(Employe $employe)
    {
        if ($employe->photo) {
            Storage::delete('public/' . $employe->photo);
        }
    }
}
