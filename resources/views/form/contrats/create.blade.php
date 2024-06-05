<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
