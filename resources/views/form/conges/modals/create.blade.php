<!-- Contenu du formulaire de création -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Ajouter un congé</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de création -->
                <form action="{{ route('conges.store') }}" method="POST">
                    @csrf
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
                        <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                        <!-- Ajout d'une validation requise pour la date de début -->
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                        <!-- Ajout d'une validation requise pour la date de fin -->
                    </div>
                    <div class="form-group">
                        <label for="motif">Motif</label>
                        <textarea class="form-control" id="motif" name="motif" required></textarea>
                        <!-- Ajout d'une validation requise pour le motif -->
                    </div>
                    <div class="form-group">
                        <label for="approuve">Approuvé</label>
                        <select class="form-control" id="approuve" name="approuve">
                            {{-- Remplissez la liste des statuts ici --}}
                            <option value="0">En attente</option>
                            <option value="1">Approuvé</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <!-- Ajout du bouton d'enregistrement au formulaire -->
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
