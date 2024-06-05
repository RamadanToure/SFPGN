<!-- Dans resources/views/form/paies/absences.blade.php -->
@extends('layouts.app') {{-- Assurez-vous que votre vue hérite du layout approprié --}}

@section('content')
    <div class="container">
        <h2>Absences pour {{ $employe->nom }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Motif</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <!-- Ajoutez d'autres colonnes si nécessaire -->
                </tr>
            </thead>
            <tbody>
                @foreach($absences as $absence)
                    <tr>
                        <td>{{ $absence->motif }}</td>
                        <td>{{ $absence->date_debut }}</td>
                        <td>{{ $absence->date_fin }}</td>
                        <!-- Ajoutez d'autres colonnes selon votre modèle Absence -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

