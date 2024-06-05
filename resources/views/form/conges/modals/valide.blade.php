@foreach($demandesValidees as $demandeValidee)
    <div class="modal fade" id="showModal{{ $demandeValidee->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $demandeValidee->id }}" aria-hidden="true">
        <!-- Le contenu du modal pour les demandes validées -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demandesValidesModalLabel">Demandes de congé validées</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody{{ $demandeValidee->id }}">
                    <!-- Contenu de la modal (chargé dynamiquement via AJAX) -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Utilisez cet exemple pour charger dynamiquement le contenu via AJAX
        $(document).ready(function () {
            $('#showModal{{ $demandeValidee->id }}').on('show.bs.modal', function (e) {
                $.ajax({
                    url: "{{ route('conges.show', $demandeValidee->id) }}",
                    type: "GET",
                    success: function (data) {
                        $('#modalBody{{ $demandeValidee->id }}').html(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endforeach
