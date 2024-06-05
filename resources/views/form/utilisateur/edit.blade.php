<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $utilisateur->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $utilisateur->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $utilisateur->id }}">Éditer l'Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire d'édition de l'utilisateur -->
                <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" value="{{ $utilisateur->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="{{ $utilisateur->email }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role :</label>
                        <select name="role" class="form-control" required>
                            <option value="user" {{ $utilisateur->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                            <option value="admin" {{ $utilisateur->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                            <!-- Ajoutez d'autres rôles si nécessaire -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="file" name="image" class="form-control">
                        <!-- Ajoutez une prévisualisation de l'image si nécessaire -->
                    </div>

                    <!-- Ajoutez d'autres champs selon vos besoins -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

