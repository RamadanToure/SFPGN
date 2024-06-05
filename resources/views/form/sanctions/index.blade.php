@extends('layouts.app')

@section('page-title', 'Gestion des Sanctions et Avertissements')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des sanctions et avertissements</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Ajouter une sanction/avertissement
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="sanctionsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Employé</th>
                            <th>Type</th>
                            <th>Motif</th>
                            <th>Date de Sanction</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanctions as $sanction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sanction->employe->nom }} {{ $sanction->employe->prenom }}</td>
                                <td>{{ $sanction->type }}</td>
                                <td>{{ $sanction->motif }}</td>
                                <td>{{ $sanction->date_sanction }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $sanction->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $sanction->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $sanction->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $sanction->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Supprimer la sanction/avertissement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer cette sanction/avertissement?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('sanctions.destroy', $sanction->id) }}" method="post">
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

            @foreach($sanctions as $sanction)
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $sanction->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Modifier la sanction/avertissement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('sanctions.update', $sanction->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="employe_id">Employé</label>
                                    <select name="employe_id" id="employe_id" class="form-control" required>
                                        @foreach($employes as $employe)
                                            <option value="{{ $employe->id }}" @if($employe->id == $sanction->employe_id) selected @endif>{{ $employe->nom }} {{ $employe->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control" value="{{ $sanction->type }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="motif">Motif</label>
                                    <textarea name="motif" id="motif" class="form-control" required>{{ $sanction->motif }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date_sanction">Date de Sanction</label>
                                    <input type="date" name="date_sanction" id="date_sanction" class="form-control" value="{{ $sanction->date_sanction }}" required>
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

            <!-- Show Modal -->
            <div class="modal fade" id="showModal{{ $sanction->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showModalLabel">Détails de la sanction/avertissement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Employé :</strong> {{ $sanction->employe->nom }} {{ $sanction->employe->prenom }}</p>
                            <p><strong>Type :</strong> {{ $sanction->type }}</p>
                            <p><strong>Motif :</strong> {{ $sanction->motif }}</p>
                            <p><strong>Date de Sanction :</strong> {{ $sanction->date_sanction }}</p>
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
                            <h5 class="modal-title" id="createModalLabel">Ajouter une sanction/avertissement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('sanctions.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="employe_id">Employé</label>
                                    <select name="employe_id" id="employe_id" class="form-control" required>
                                        <option value="" disabled selected>Choisissez un employé</option>
                                        @foreach($employes as $employe)
                                            <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="motif">Motif</label>
                                    <textarea name="motif" id="motif" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="date_sanction">Date de Sanction</label>
                                    <input type="date" name="date_sanction" id="date_sanction" class="form-control" required>
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
