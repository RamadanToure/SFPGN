<?php

use App\Http\Controllers\AlerteController;
use App\Http\Controllers\BonPharmacieController;
use App\Http\Controllers\CongeCalendarController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HeuresSupplementairesController;
use App\Http\Controllers\HeuresTravailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaieController;
use App\Http\Controllers\RecrutementController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SanctionController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\TypeContratController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::middleware(['auth'])->group(function () {
    // Routes accessibles uniquement par les utilisateurs ayant le rôle 'user'
    Route::middleware(['auth', 'checkrole:user'])->group(function () {
        Route::resource('employes', EmployeController::class);
        Route::resource('conges', CongeController::class);

        Route::get('/conge-calendar', [CongeCalendarController::class, 'index'])->name('conge-calendar');
        Route::post('/conges/{conge}/rejeter', 'CongeController@rejeterDemande')->name('conges.rejeter');
        Route::get('/conges/valides', 'CongeController@demandesValidees')->name('conges.valides');
    });

    // Routes accessibles uniquement par les utilisateurs ayant le rôle 'admin'
    Route::middleware(['auth', 'checkrole:admin'])->group(function () {
        Route::resource('utilisateurs', UtilisateurController::class);
        Route::resource('societes', SocieteController::class);

        // Paramétres
        Route::resource('typeContrats', TypeContratController::class);
        Route::resource('contrat', ContratController::class);
        Route::resource('paies', PaieController::class);

        Route::get('paies/{employeId}/primes', [PaieController::class, 'primes'])->name('paies.primes');
        Route::get('paies/{employeId}/absences', [PaieController::class, 'absences'])->name('paies.absences');
        Route::resource('heures_supplementaires', HeuresSupplementairesController::class);
        Route::resource('bons_pharmacie', BonPharmacieController::class);
        Route::resource('heures-travail', HeuresTravailController::class);
        Route::resource('alertes', AlerteController::class);

        Route::get('/employes/export-pdf', [EmployeController::class, 'exportPDF'])->name('employes.exportPDF');
        Route::resource('evaluations', EvaluationController::class);
        Route::resource('formations', FormationController::class);
        Route::resource('recrutement', RecrutementController::class);
        Route::resource('sanctions', SanctionController::class);
    });

    // Route du tableau de bord pour les deux types d'utilisateurs
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

?>
