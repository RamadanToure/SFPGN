<!-- resources/views/form/typeContrat/delete.blade.php -->
<div class="modal fade" id="deleteModal{{ $typeContrat->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $typeContrat->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $typeContrat->id }}">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer "{{ $typeContrat->nom }}" ?</p>
                <form action="{{ route('typeContrats.destroy', $typeContrat->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
