<!-- resources/views/form/typeContrat/edit.blade.php -->
<div class="modal fade" id="editModal{{ $typeContrat->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $typeContrat->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $typeContrat->id }}">Modifier le type de contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('typeContrats.update', $typeContrat->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nom">Nom du type de contrat:</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $typeContrat->nom }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
