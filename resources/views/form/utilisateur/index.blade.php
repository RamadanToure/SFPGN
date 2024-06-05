@extends('layouts.app') <!-- Assurez-vous d'ajuster le nom du layout selon votre configuration -->

@section('page-title', 'Gestion des Utilisateurs')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des utilisateurs</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Créer un utilisateur</button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="utilisateursTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($utilisateurs as $utilisateur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $utilisateur->name }}</td>
                                <td>{{ $utilisateur->email }}</td>
                                <td>{{ $utilisateur->role }}</td>
                                <td>
                                    <a href="{{ route('utilisateurs.show', $utilisateur->id) }}" class="btn btn-info" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $utilisateur->id }}" title="Éditer">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" title="Supprimer" data-toggle="modal" data-target="#deleteConfirmationModal{{$utilisateur->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- Modal de confirmation de suppression -->
                                        <div class="modal fade" id="deleteConfirmationModal{{$utilisateur->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{$utilisateur->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteConfirmationModalLabel{{$utilisateur->id}}">Confirmation de suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('form.utilisateur.delete')

        @include('form.utilisateur.create')
        <!-- /.card -->
    </div>
    <!-- /.col -->
    @include('form.utilisateur.edit')
</div>

@endsection
