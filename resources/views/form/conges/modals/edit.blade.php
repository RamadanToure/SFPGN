<!-- Modals (edit) -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Contenu du formulaire d'édition -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Mondifier le congé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'édition -->
                <form action="{{ route('conges.update', $conge->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    {{-- Champs du formulaire --}}
                    <div class="form-group">
                        <label for="employe_id">Employé</label>
                        <select class="form-control" id="employe_id" name="employe_id">
                            {{-- Remplissez la liste des employés ici --}}
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input type="date" class="form-control" id="edit_debut" name="date_debut" value="{{ $conge->date_debut ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="edit_fin">Date de fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $conge->date_fin ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="'approuve'">Statut</label>
                        <select class="form-control" id="'approuve'" name="'approuve'">
                            {{-- Remplissez la liste des statuts ici --}}
                            <option value="En attente">En attente</option>
                            <option value="Approuvé">Approuvé</option>
                            <option value="Refusé">Refusé</option>
                        </select>
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
