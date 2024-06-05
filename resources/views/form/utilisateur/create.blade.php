<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Formulaire de création d'un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('utilisateurs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nom -->
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Image d'utilisateur -->
                    <div class="form-group">
                        <label for="image">Image d'utilisateur</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                    <!-- Autres champs -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="user">Utilisateur</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email_verified_at">Vérification de l'email</label>
                        <input type="datetime-local" name="email_verified_at" class="form-control">
                    </div>

                    <!-- Ajoutez d'autres champs selon votre table 'users' -->

                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>
</div>
