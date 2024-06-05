@foreach($employes as $employe)
<div class="modal fade" id="editModal{{ $employe->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $employe->id }}" aria-hidden="true">
        <!-- Your edit modal content goes here -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $employe->id }}">Modifier un employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employes.update', $employe->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" class="form-control" value="{{ $employe->nom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input type="text" name="adresse" class="form-control" value="{{ $employe->adresse }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ $employe->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Téléphone:</label>
                            <input type="text" name="telephone" class="form-control" value="{{ $employe->telephone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fonction">Fonction:</label>
                            <input type="text" name="fonction" class="form-control" value="{{ $employe->fonction }}" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
            </div>
        </div>
    </div>
@endforeach
