<!-- Modals (show) -->
@foreach($conges as $conge)
<div class="modal fade" id="showModal{{ $conge->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Contenu des détails du congé -->
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Détails du congé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Afficher les détails du congé ici -->
                    <p><strong>Employé:</strong> {{ $conge->employe->nom }}</p>
                    <p><strong>Période:</strong> {{ $conge->periode }}</p>
                    <p><strong>Statut:</strong> {{ $conge->statut }}</p>

                    <!-- Section pour les informations spécifiques au statut -->
                    @if ($conge->statut === 'En attente' && Auth::user()->estAutorise())
                        <div>
                            <p><strong>Approbation:</strong> <span id="approbationDetails">En attente d'approbation</span></p>
                            <!-- Ajoutez d'autres détails spécifiques à l'approbation ici si nécessaire -->
                            <p><strong>Motif de l'approbation:</strong> {{ $conge->motif_approbation }}</p>
                            <p><strong>Commentaires de l'approbateur:</strong> {{ $conge->commentaires_approbateur }}</p>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <!-- Bouton de fermeture -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                    <!-- Boutons de validation et de rejet (affichés uniquement si autorisé et en attente) -->
                    @if ($conge->statut === 'En attente' && Auth::user()->estAutorise())
                        <form action="{{ route('conges.valider', $conge->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="validerDemandeBtn">Valider</button>
                        </form>

                        <form action="{{ route('conges.rejeter', $conge->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger" id="rejeterDemandeBtn">Rejeter</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
