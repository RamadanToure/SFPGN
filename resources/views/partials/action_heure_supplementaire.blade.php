<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Créer une heure supplémentaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('heures_supplementaires.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="employe_id">Employé :</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre_heures">Nombre d'heures :</label>
                        <input type="text" name="nombre_heures" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="date_heure_supplementaire">Date :</label>
                        <input type="date" name="date_heure_supplementaire" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($heuresSupplementaires as $heureSupplementaire)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $heureSupplementaire->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $heureSupplementaire->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $heureSupplementaire->id }}">Modifier une heure supplémentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('heures_supplementaires.update', $heureSupplementaire->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="employe_id">Employé :</label>
                            <select name="employe_id" id="employe_id" class="form-control" required>
                                @foreach($employes as $employe)
                                    <option value="{{ $employe->id }}" {{ $heureSupplementaire->employe_id == $employe->id ? 'selected' : '' }}>{{ $employe->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre_heures">Nombre d'heures :</label>
                            <input type="text" name="nombre_heures" class="form-control" value="{{ $heureSupplementaire->nombre_heures }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date_heure_supplementaire">Date :</label>
                            <input type="date" name="date_heure_supplementaire" class="form-control" value="{{ $heureSupplementaire->date_heure_supplementaire }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $heureSupplementaire->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $heureSupplementaire->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $heureSupplementaire->id }}">Supprimer une heure supplémentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenu du modal delete -->
                    <p>Êtes-vous sûr de vouloir supprimer cette heure supplémentaire ?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('heures_supplementaires.destroy', $heureSupplementaire->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Modal -->
    <div class="modal fade" id="showModal{{ $heureSupplementaire->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $heureSupplementaire->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel{{ $heureSupplementaire->id }}">Détails de l'heure supplémentaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenu du modal show -->
                    <p><strong>Employé :</strong> {{ $heureSupplementaire->employe->nom }}</p>
                    <p><strong>Nombre d'heures :</strong> {{ $heureSupplementaire->nombre_heures }}</p>
                    <p><strong>Date :</strong> {{ $heureSupplementaire->date_heure_supplementaire }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
