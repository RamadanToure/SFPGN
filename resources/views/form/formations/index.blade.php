@extends('layouts.app')

@section('page-title', 'Gestion des Formations')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des formations</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Enregistrer une formation
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="formationsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Employé</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Lieu</th>
                            <th>Formateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formations as $formation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $formation->employe->nom }}</td>
                                <td>{{ $formation->titre }}</td>
                                <td>{{ $formation->description }}</td>
                                <td>{{ $formation->date_debut }}</td>
                                <td>{{ $formation->date_fin }}</td>
                                <td>{{ $formation->lieu }}</td>
                                <td>{{ $formation->formateur }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $formation->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $formation->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $formation->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Supprimer la formation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer cette formation?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('formations.destroy', $formation->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @foreach($formations as $formation)
            <div class="modal fade" id="editModal{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Modifier la formation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('formations.update', $formation->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="employe_id">Employé</label>
                                    <select name="employe_id" id="employe_id" class="form-control" required>
                                        @foreach($employes as $employe)
                                            <option value="{{ $employe->id }}" {{ $formation->employe_id == $employe->id ? 'selected' : '' }}>{{ $employe->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" name="titre" id="titre" class="form-control" value="{{ $formation->titre }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" required>{{ $formation->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date de début</label>
                                    <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $formation->date_debut }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date de fin</label>
                                    <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $formation->date_fin }}">
                                </div>

                                <div class="form-group">
                                    <label for="lieu">Lieu</label>
                                    <input type="text" name="lieu" id="lieu" class="form-control" value="{{ $formation->lieu }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="formateur">Formateur</label>
                                    <input type="text" name="formateur" id="formateur" class="form-control" value="{{ $formation->formateur }}" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="showModal{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showModalLabel">Détails de la formation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Titre:</strong> {{ $formation->titre }}</p>
                            <p><strong>Description:</strong> {{ $formation->description }}</p>
                            <p><strong>Date de début:</strong> {{ $formation->date_debut }}</p>
                            <p><strong>Date de fin:</strong> {{ $formation->date_fin ?? 'Non spécifiée' }}</p>
                            <p><strong>Lieu:</strong> {{ $formation->lieu }}</p>
                            <p><strong>Formateur:</strong> {{ $formation->formateur }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Create Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Créer une formation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('formations.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="employe_id">Employé</label>
                                    <select name="employe_id" id="employe_id" class="form-control" required>
                                        @foreach($employes as $employe)
                                            <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" name="titre" id="titre" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date_debut">Date de début</label>
                                    <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">Date de fin (optionnel)</label>
                                    <input type="date" name="date_fin" id="date_fin" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="lieu">Lieu</label>
                                    <input type="text" name="lieu" id="lieu" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="formateur">Formateur</label>
                                    <input type="text" name="formateur" id="formateur" class="form-control" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#createModal').modal('show');
    });
</script>

@endsection
