@extends('layouts.app')

@section('page-title', 'Gestion des Recrutements')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des recrutements</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Créer un recrutement
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="recrutementsTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th>N°</th>
                            <th>Poste</th>
                            <th>Description</th>
                            <th>Date Limite</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recrutements as $recrutement)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $recrutement->poste }}</td>
                                <td>{{ $recrutement->description }}</td>
                                <td>{{ $recrutement->date_limite }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $recrutement->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $recrutement->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $recrutement->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $recrutement->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Supprimer le recrutement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- Affichez le message de confirmation de suppression ici --}}
                                            <p>Êtes-vous sûr de vouloir supprimer le recrutement "{{ $recrutement->poste }}" ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('recrutement.destroy', $recrutement->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $recrutement->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Modifier le recrutement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('recrutement.update', $recrutement->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="poste">Poste</label>
                                                    <input type="text" name="poste" id="poste" class="form-control" value="{{ $recrutement->poste }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $recrutement->description }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="date_limite">Date limite</label>
                                                    <input type="date" name="date_limite" id="date_limite" class="form-control" value="{{ $recrutement->date_limite }}" required>
                                                </div>

                                                {{-- Ajoutez d'autres champs selon vos besoins --}}

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- Si vous utilisez l'inclusion du formulaire --}}
                                        {{-- @include('recrutements.form', ['action' => route('recrutements.update', $recrutement->id), 'recrutement' => $recrutement]) --}}
                                    </div>
                                </div>
                            </div>


                            <!-- Show Modal -->
                            <div class="modal fade" id="showModal{{ $recrutement->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showModalLabel">Détails du recrutement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- Affichez les détails du recrutement ici --}}
                                            <p><strong>Poste:</strong> {{ $recrutement->poste }}</p>
                                            <p><strong>Description:</strong> {{ $recrutement->description }}</p>
                                            <p><strong>Date limite:</strong> {{ $recrutement->date_limite }}</p>
                                            {{-- Affichez d'autres détails selon vos besoins --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5">Aucun recrutement trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
