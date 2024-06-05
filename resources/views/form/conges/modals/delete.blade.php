@foreach($conges as $conge)
<!-- Modals (delete) -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel{{ $conge->id }}">Supprimer le bon de pharmacie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Voulez-vous vraiment supprimer le congé de {{ $conge->nom }} émis le {{ $conge->periode }}?</p>
        </div>
        <div class="modal-footer">
            <form action="{{ route('conges.destroy', $conge->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
    </div>
</div>

@endforeach
