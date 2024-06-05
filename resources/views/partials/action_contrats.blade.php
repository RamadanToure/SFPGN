@foreach($contrats as $contrat)
<div class="modal fade" id="editModal{{ $contrat->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel">Modifier le contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contrat.update', $contrat->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="employe_id">Employé</label>
                        <select name="employe_id" id="employe_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" @if($employee->id == $contrat->employe_id) selected @endif>{{ $employee->nom }} {{ $employee->prenom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type_contrat_id">Type de Contrat</label>
                        <select name="type_contrat_id" id="type_contrat_id" class="form-control">
                            @foreach($typesContrat as $typeContrat)
                                <option value="{{ $typeContrat->id }}" @if($typeContrat->id == $contrat->type_contrat_id) selected @endif>{{ $typeContrat->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $contrat->date_debut }}" required>
                    </div>

                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $contrat->date_fin }}">
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

<div class="modal fade" id="showModal{{ $contrat->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="showModalLabel">Détails du contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if($contrat->employe)
                    <p><strong>Employé:</strong> {{ $contrat->employe->nom }} {{ $contrat->employe->prenom }}</p>
                @else
                    <p><strong>Employé:</strong> Non spécifié</p>
                @endif
                <p><strong>Type de Contrat:</strong> {{ $contrat->typeContrat->nom }}</p>
                <p><strong>Date de début:</strong> {{ $contrat->date_debut }}</p>
                <p><strong>Date de fin:</strong> {{ $contrat->date_fin ?? 'Non spécifiée' }}</p>
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
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel">Créer un contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contrat.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="employe_id">Employé</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            <option value="" disabled selected>Choisissez un employé</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type_contrat_id">Type de Contrat</label>
                        <select name="type_contrat_id" id="type_contrat_id" class="form-control" required>
                            <option value="" disabled selected>Choisissez un type de contrat</option>
                            @foreach($typesContrat as $typeContrat)
                                <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="date_fin">Date de fin (optionnel)</label>
                        <input type="date" name="date_fin" id="date_fin" class="form-control">
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $contrat->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="deleteModalLabel">Supprimer le contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer ce contrat?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form action="{{ route('contrat.destroy', $contrat->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
