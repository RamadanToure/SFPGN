<!-- Edit Modal -->
@foreach($societes as $societe)
<div class="modal fade" id="editModal{{ $societe->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $societe->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $societe->id }}">Modification de la société</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Edit Form -->
                <form action="{{ route('societes.update', $societe->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nom">Nom de la société</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $societe->nom }}" required>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $societe->adresse }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $societe->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $societe->telephone }}" required>
                    </div>

                    <div class="form-group">
                        <label for="responsable">Responsable</label>
                        <input type="text" class="form-control" id="responsable" name="responsable" value="{{ $societe->responsable }}" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier la société</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
