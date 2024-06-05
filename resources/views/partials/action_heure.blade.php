  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Ajouter une entrée d'heures de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('heures-travail.store') }}" method="POST">
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
                        <label for="heure_entree">Heure d'Entrée :</label>
                        <input type="datetime-local" name="heure_entree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="heure_sortie">Heure de Sortie :</label>
                        <input type="datetime-local" name="heure_sortie" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach($heuresTravail as $heure)
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $heure->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $heure->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $heure->id }}">Modifier l'entrée d'heures de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('heures-travail.update', $heure->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="employe_id">Employé :</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}" {{ $heure->employe_id == $employe->id ? 'selected' : '' }}>
                                    {{ $employe->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="heure_entree">Heure d'Entrée :</label>
                        <input type="datetime-local" name="heure_entree" class="form-control" value="{{ \Carbon\Carbon::parse($heure->heure_entree)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="heure_sortie">Heure de Sortie :</label>
                        <input type="datetime-local" name="heure_sortie" class="form-control" value="{{ $heure->heure_sortie ? \Carbon\Carbon::parse($heure->heure_sortie)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $heure->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $heure->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $heure->id }}">Supprimer l'entrée d'heures de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer l'entrée d'heures de travail pour {{ $heure->employe->nom }}?</p>
                <form action="{{ route('heures-travail.destroy', $heure->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Show Modal -->
<div class="modal fade" id="showModal{{ $heure->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $heure->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $heure->id }}">Détails de l'entrée d'heures de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Employé:</strong> {{ $heure->employe->nom }}</p>
                <p><strong>Heure d'Entrée:</strong> {{ \Carbon\Carbon::parse($heure->heure_entree)->format('d/m/Y H:i') }}</p>
                <p><strong>Heure de Sortie:</strong> {{ $heure->heure_sortie ? \Carbon\Carbon::parse($heure->heure_sortie)->format('d/m/Y H:i') : 'Non enregistrée' }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
