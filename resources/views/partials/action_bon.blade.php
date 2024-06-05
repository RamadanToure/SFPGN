<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Créer un bon de pharmacie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="modal-body">
                <form action="{{ route('bons_pharmacie.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="employe_id">Employé :</label>
                        <select name="employe_id" id="employe_id" class="form-control" required>
                            @foreach($employes as $employe)
                                <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_emission">Date d'émission :</label>
                        <input type="date" name="date_emission" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant :</label>
                        <input type="text" name="montant" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($bonsPharmacie as $bonPharmacie)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $bonPharmacie->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $bonPharmacie->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $bonPharmacie->id }}">Modifier le bon de pharmacie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <form action="{{ route('bons_pharmacie.update', $bonPharmacie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="employe_id">Employé :</label>
                            <select name="employe_id" id="employe_id" class="form-control" required>
                                @foreach($employes as $employe)
                                    <option value="{{ $employe->id }}" {{ $bonPharmacie->employe_id == $employe->id ? 'selected' : '' }}>{{ $employe->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_emission">Date d'émission :</label>
                            <input type="date" name="date_emission" class="form-control" value="{{ $bonPharmacie->date_emission }}" required>
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant :</label>
                            <input type="text" name="montant" class="form-control" value="{{ $bonPharmacie->montant }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control" rows="3">{{ $bonPharmacie->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Modal -->
    <div class="modal fade" id="showModal{{ $bonPharmacie->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $bonPharmacie->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel{{ $bonPharmacie->id }}">Détails du bon de pharmacie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($employe->photo)
                    <div class="rounded-circle overflow-hidden mx-auto" style="width: 200px; height: 200px;">
                        <img class="img-fluid" src="{{ asset('storage/' . $employe->photo) }}" alt="Photo de l'employé" width="200" height="200" style="object-fit: cover;">
                    </div>
                    @else
                        <p><strong>Photo:</strong> Aucune photo disponible</p>
                    @endif
                    <hr>
                    <p><strong>Employé :</strong> {{ $bonPharmacie->employe->nom }}</p>
                    <p><strong>Date d'émission :</strong> {{ $bonPharmacie->date_emission }}</p>
                    <p><strong>Montant :</strong> {{ $bonPharmacie->montant }}</p>
                    <p><strong>Description :</strong> {{ $bonPharmacie->description ?: 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $bonPharmacie->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $bonPharmacie->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $bonPharmacie->id }}">Supprimer le bon de pharmacie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer le bon de pharmacie de {{ $bonPharmacie->employe->nom }} émis le {{ $bonPharmacie->date_emission }}?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('bons_pharmacie.destroy', $bonPharmacie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
