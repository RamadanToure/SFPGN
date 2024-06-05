
@extends('layouts.app')

@section('page-title', 'Gestion des Paies')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des paies</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        <i class="fas fa-plus"></i> Créer
                    </button>
                </div>
            </div>
            <div class="card-header">
                <div class="card-tools">
                    <form action="{{ route('paies.index') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Rechercher...">
                            <input type="date" name="date" class="form-control" placeholder="Date...">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card-body">
                <table id="paiesTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th class="text-center">N°</th>
                            <th>Employé</th>
                            <th class="text-center">Mois de Paie</th>
                            <th class="text-center">Salaire de Base</th>
                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paies as $paie)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td >@if($paie->employe)
                                    {{ $paie->employe->nom }}
                                @else
                                    Employé non trouvé
                                @endif</td>
                                <td class="text-center">{{ $paie->mois_paie }}</td>
                                <td class="text-center">{{ $paie->salaire_base }}</td>
                                @include('options.paies')
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <!-- Modals -->
        @foreach($paies as $paie)
            @include('partials.action_paies', ['paie' => $paie])
        @endforeach

    </div>
</div>
  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel">Créer une paie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paies.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="employe_id" class="form-label">Employé :</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mois_paie" class="form-label">Mois de Paie :</label>
                        <input type="date" name="mois_paie" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="salaire_base" class="form-label">Salaire de Base :</label>
                        <input type="number" name="salaire_base" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

