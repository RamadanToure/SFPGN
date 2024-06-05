
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div  class="modal-header bg-primary">
                    <h5 class="modal-title" id="createModalLabel">Créer un employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <div class="container">
                        <form action="{{ route('employes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nom">Nom :</label>
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="adresse">Adresse :</label>
                                    <input type="text" name="adresse" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="telephone">Téléphone :</label>
                                    <input type="text" name="telephone" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="fonction">Fonction :</label>
                                    <input type="text" name="fonction" class="form-control" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="type_contrat_id">Type de Contrat :</label>
                                    <select name="type_contrat_id" id="type_contrat_id" class="form-control">
                                        @foreach($typesContrat as $typeContrat)
                                            <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="date_debut">Date de Début :</label>
                                    <input type="date" name="date_debut" class="form-control" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="photo">Photo :</label>
                                        <input type="file" name="photo" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



 @foreach($employes as $employe)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal{{ $employe->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $employe->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div  class="modal-header bg-primary">
                    <h5 class="modal-title" id="editModalLabel{{ $employe->id }}">Modifier un employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employes.update', $employe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nom">Nom:</label>
                                <input type="text" name="nom" class="form-control" value="{{ $employe->nom }}" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="adresse">Adresse:</label>
                                <input type="text" name="adresse" class="form-control" value="{{ $employe->adresse }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $employe->email }}" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="telephone">Téléphone:</label>
                                <input type="text" name="telephone" class="form-control" value="{{ $employe->telephone }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="fonction">Fonction:</label>
                                <input type="text" name="fonction" class="form-control" value="{{ $employe->fonction }}" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="date_debut">Date de Début :</label>
                                <input type="date" name="date_debut" class="form-control" value="{{ old('date_debut', $employe->date_debut) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="type_contrat_id">Type de Contrat :</label>
                                <select name="type_contrat_id" id="type_contrat_id" class="form-control">
                                    @foreach($typesContrat as $typeContrat)
                                        <option value="{{ $typeContrat->id }}">{{ $typeContrat->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="photo">Photo :</label>
                                    <input type="file" name="photo" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal{{ $employe->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $employe->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="deleteModalLabel{{ $employe->id }}">Supprimer un employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer l'employé "{{ $employe->nom }}"?</p>
                    <form action="{{ route('employes.destroy', $employe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="showModal{{ $employe->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $employe->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="showModalLabel{{ $employe->id }}">Détails de l'employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <div class="form-group row">
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Nom:</strong> {{ $employe->nom }}</p>
                        </div>
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Adresse:</strong> {{ $employe->adresse }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Email:</strong> {{ $employe->email }}</p>
                        </div>
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Téléphone:</strong> {{ $employe->telephone }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Fonction:</strong> {{ $employe->fonction }}</p>
                        </div>
                        <div class="col-sm-6 mb-1 mb-sm-0">
                            <p><strong>Type de Contrats:</strong> {{ $employe->typeContrat->nom  }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <a href="{{ route('employes.index') }}" style="color: white; text-decoration: none;">Retour</a>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endforeach


