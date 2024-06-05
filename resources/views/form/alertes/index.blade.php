@extends('layouts.app')

@section('page-title', 'Gestion des Alertes et Congés')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des Alertes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAlerteModal">
                        Ajouter une Alerte
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table id="alertesTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th>N°</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date d'Alerte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alertes as $alerte)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alerte->titre }}</td>
                                <td>{{ $alerte->description }}</td>
                                <td>{{ $alerte->date_alerte }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showAlerteModal{{ $alerte->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editAlerteModal{{ $alerte->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlerteModal{{ $alerte->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Create Alerte Modal -->
            <div class="modal fade" id="createAlerteModal" tabindex="-1" aria-labelledby="createAlerteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createAlerteModalLabel">Ajouter une Alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('alertes.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="titre">Titre:</label>
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date_alerte">Date d'Alerte:</label>
                                    <input type="datetime-local" name="date_alerte" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Other modals for editing, deleting, and showing alertes... -->
            <!-- Edit Alerte Modal -->
            @foreach($alertes as $alerte)
            <!-- Edit Alerte Modal -->
            <div class="modal fade" id="editAlerteModal{{ $alerte->id }}" tabindex="-1" aria-labelledby="editAlerteModalLabel{{ $alerte->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAlerteModalLabel{{ $alerte->id }}">Modifier l'Alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('alertes.update', $alerte->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="titre">Titre:</label>
                                    <input type="text" name="titre" class="form-control" value="{{ $alerte->titre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" required>{{ $alerte->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date_alerte">Date d'Alerte:</label>
                                    <input type="datetime-local" name="date_alerte" class="form-control" value="{{ \Carbon\Carbon::parse($alerte->date_alerte)->format('Y-m-d\TH:i') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Show Alerte Modal -->
            <div class="modal fade" id="showAlerteModal{{ $alerte->id }}" tabindex="-1" aria-labelledby="showAlerteModalLabel{{ $alerte->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showAlerteModalLabel{{ $alerte->id }}">Détails de l'Alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Titre:</strong> {{ $alerte->titre }}</p>
                            <p><strong>Description:</strong> {{ $alerte->description }}</p>
                            <p><strong>Date d'Alerte:</strong> {{ \Carbon\Carbon::parse($alerte->date_alerte)->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>


                <!-- Delete Alerte Modal -->
            <div class="modal fade" id="deleteAlerteModal{{ $alerte->id }}" tabindex="-1" aria-labelledby="deleteAlerteModalLabel{{ $alerte->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAlerteModalLabel{{ $alerte->id }}">Supprimer l'Alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes-vous sûr de vouloir supprimer cette Alerte?</p>
                            <form action="{{ route('alertes.destroy', $alerte->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function openCreateAlerteModal() {
            var myModal = new bootstrap.Modal(document.getElementById('createAlerteModal'));
            myModal.show();
        }
    </script>
@endsection
