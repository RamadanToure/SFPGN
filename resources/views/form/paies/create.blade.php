<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
