
    <div class="modal fade" id="showModal{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $employe->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel{{ $employe->id }}">Détails de l'employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom:</strong> {{ $employe->nom }}</p>
                    <p><strong>Adresse:</strong> {{ $employe->adresse }}</p>
                    <p><strong>Email:</strong> {{ $employe->email }}</p>
                    <p><strong>Téléphone:</strong> {{ $employe->telephone }}</p>
                    <p><strong>Fonction:</strong> {{ $employe->fonction }}</p>

                    @if($employe->photo)
                        <p><strong>Photo:</strong></p>
                        <img class="img-fluid" src="{{ asset($employe->photo) }}" alt="Photo de l'employé" width="800" height="800">
                    @else
                        <p><strong>Photo:</strong> Aucune photo disponible</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
