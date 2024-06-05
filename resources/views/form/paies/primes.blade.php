
<div class="modal fade" id="actionModal{{ $paie->id }}-primes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Primes pour {{ $employe->nom }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type de Prime</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <!-- Ajoutez d'autres colonnes si nécessaire -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($primes as $prime)
                            <tr>
                                <td>{{ $prime->type }}</td>
                                <td>{{ $prime->montant }}</td>
                                <td>{{ $prime->date }}</td>
                                <!-- Ajoutez d'autres colonnes selon votre modèle Prime -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!-- Vous pouvez ajouter des boutons ou des actions supplémentaires ici -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
