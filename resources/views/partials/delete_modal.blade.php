@foreach($employes as $employe)
<div class="modal fade" id="deleteModal{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $employe->id }}" aria-hidden="true">
        <!-- Your delete modal content goes here -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $employe->id }}">Supprimer un employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer l'employé "{{ $employe->nom }}"?</p>
                    <form action="{{ route('employes.destroy', $employe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
