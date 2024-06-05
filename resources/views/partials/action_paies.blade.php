<!-- Action Modals -->
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

<div class="modal fade" id="actionModal{{ $paie->id }}-show" tabindex="-1" aria-labelledby="actionModalLabel{{ $paie->id }}-show" aria-hidden="true">
    <!-- ... Modal Content for Show Action ... -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="showModalLabel{{ $paie->id }}">Détails de la paie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    @if($employe->photo)
                    <div class="rounded-circle overflow-hidden mx-auto" style="width: 200px; height: 200px;">
                        <img class="img-fluid" src="{{ asset('storage/' . $employe->photo) }}" alt="Photo de l'employé" width="200" height="200" style="object-fit: cover;">
                    </div>
                        @else
                            <p><strong>Photo:</strong> Aucune photo disponible</p>
                        @endif
                    <hr>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Employé :</strong>
                                @if($paie->employe)
                                {{ $paie->employe->nom }}
                            @else
                                Employé non trouvé
                            @endif
                        </p>
                        </div>
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Mois de Paie:</strong> {{ $paie->mois_paie }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Salaire de Base:</strong> {{ $paie->salaire_base }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <a href="{{ route('paies.index') }}" style="color: white; text-decoration: none;">Retour</a>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="actionModal{{ $paie->id }}-edit" tabindex="-1" aria-labelledby="actionModalLabel{{ $paie->id }}-edit" aria-hidden="true">
    <!-- ... Modal Content for Edit Action ... -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $paie->id }}">Modifier une paie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('paies.update', $paie->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Champs pour l'édition -->
                    <div class="mb-3">
                        <label for="employe_id" class="form-label">Employé :</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}" {{ $paie->employe_id == $employe->id ? 'selected' : '' }}>{{ $employe->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mois_paie" class="form-label">Mois de Paie :</label>
                        <input type="date" name="mois_paie" class="form-control" value="{{ $paie->mois_paie }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="salaire_base" class="form-label">Salaire de Base :</label>
                        <input type="number" name="salaire_base" class="form-control" value="{{ $paie->salaire_base }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="actionModal{{ $paie->id }}-delete" tabindex="-1" aria-labelledby="actionModalLabel{{ $paie->id }}-delete" aria-hidden="true">
    <!-- ... Modal Content for Delete Action ... -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="deleteModalLabel{{ $paie->id }}">Supprimer une paie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette paie ? Cette action est irréversible.</p>
                <form action="{{ route('paies.destroy', $paie->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
