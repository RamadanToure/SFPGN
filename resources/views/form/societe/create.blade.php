             <!-- Create Modal -->
             <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Création d'une société</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Create Form -->
                            <form action="{{ route('societes.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nom">Nom de la société</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>

                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                                </div>

                                <div class="form-group">
                                    <label for="responsable">Responsable</label>
                                    <input type="text" class="form-control" id="responsable" name="responsable" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Societe</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
