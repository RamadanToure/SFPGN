@extends('layouts.app')

@section('page-title', 'Gestion des Employés')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des employés</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Formulaire de recherche -->
                <div class="mb-3">
                    <form method="GET" action="{{ route('employes.index') }}">
                        <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="{{ request('nom') }}">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="fonction">Fonction</label>
                                <input type="text" name="fonction" id="fonction" class="form-control" value="{{ request('fonction') }}">
                            </div>
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ request('telephone') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                    </form>
                </div>

                <!-- Bouton d'exportation en PDF -->
                <div class="mb-3">
                    <a href="{{ route('employes.exportPDF') }}" class="btn btn-danger" target="_blank">
                        <i class="fas fa-file-pdf"></i> Exporter en PDF
                    </a>
                </div>

                <!-- Table des employés -->
                <table id="employesTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th>N°</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Fonction</th>
                            <th>Type Contrat</th>
                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employes as $employe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($employe->photo)
                                        <img class="img-fluid" src="{{ asset('storage/' . $employe->photo) }}" alt="{{ $employe->titre }}" width="30" height="30">
                                    @else
                                        Aucune photo
                                    @endif
                                </td>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>{{ $employe->telephone }}</td>
                                <td>{{ $employe->fonction }}</td>
                                <td>{{ $employe->typeContrat->nom }}</td>
                                @include('options.employes')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel">Créer un employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="adresse">Adresse :</label>
                            <input type="text" name="adresse" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="email">Email :</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="telephone">Téléphone :</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="fonction">Fonction :</label>
                            <input type="text" name="fonction" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="type_contrat_id">Type de Contrat :</label>
                            <select name="type_contrat_id" id="type_contrat_id" class="form-control">
                                @foreach($typesContrat as $typeContrat)
                                    <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="date_debut">Date de Début :</label>
                            <input type="date" name="date_debut" class="form-control" required>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="photo">Photo :</label>
                            <input type="file" name="photo" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function openCreateModal() {
        var myModal = new bootstrap.Modal(document.getElementById('createModal'));
        myModal.show();
    }
</script>
@endsection
