<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Dashboard;
use App\Models\Employe;
use App\Models\HeuresTravail;
use App\Models\Paie;
use App\Models\Sanction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $nombre_employes = Employe::count();
        $nombre_de_sanctions = Sanction::count();
        $moyenne_salaire = Paie::avg('salaire_base');
        $conges_en_attente = Conge::where('statut', 'en attente')->count();

        $moyenne_salaire = Sanction::count();
        $moyenne_salaire = intval($moyenne_salaire);
        $heures_de_travail_par_employe = HeuresTravail::all();
        return view('dashboard', compact('nombre_employes', 'moyenne_salaire', 'conges_en_attente', 'nombre_de_sanctions', 'heures_de_travail_par_employe'));
    }
}
