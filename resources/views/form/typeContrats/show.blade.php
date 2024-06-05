<!-- resources/views/form/typeContrat/show.blade.php -->
<div class="modal fade" id="showModal{{ $typeContrat->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $typeContrat->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $typeContrat->id }}">Détails du type de contrat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nom du type de contrat:</strong> {{ $typeContrat->nom }}</p>
            </div>
        </div>
    </div>
</div>
