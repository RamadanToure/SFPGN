<!-- Show Modal -->
@foreach($societes as $societe)
<div class="modal fade" id="showModal{{ $societe->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $societe->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $societe->id }}">Show Societe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body">
                <!-- Display Societe Details -->
                <p><strong>Nom de la société:</strong> {{ $societe->nom }}</p>
                <p><strong>Adresse:</strong> {{ $societe->adresse }}</p>
                <p><strong>Email:</strong> {{ $societe->email }}</p>
                <p><strong>Téléphone:</strong> {{ $societe->telephone }}</p>
                <p><strong>Responsable:</strong> {{ $societe->responsable }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
