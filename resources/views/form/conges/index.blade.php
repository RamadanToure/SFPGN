@extends('layouts.app')

@section('page-title', 'Gestion des Congés')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des congés</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="congesTable" class="table table-bordered table-hover">
                    <!-- Tableau des Congés -->
                    <thead class="table-header-blue">
                        <tr>
                            <th>ID</th>
                            <th>Employé</th>
                            <th>Période</th>
                            <th>Statut</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Remplissez le tableau avec les données du modèle Conge --}}
                        @forelse($conges as $conge)
                            <tr>
                                <td>{{ $conge->id }}</td>
                                <td>{{ $conge->employe->nom }}</td>
                                <td>{{ $conge->periode }}</td>
                                <td>{{ $conge->statut }}</td>
                                <td class="text-center">
                                    <!-- Boutons d'action (éditer, afficher, supprimer) -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-conge="{{ $conge->toJson() }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $conge->id }}" data-conge="{{ $conge->toJson() }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-conge-id="{{ $conge->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-success demandeValideBtn" data-conge-id="{{ $conge->id }}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Aucune demande de congé disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modaux (create, edit, show, delete, calendar) -->
@include('form.conges.modals.create')
@include('form.conges.modals.edit')
@include('form.conges.modals.show')
@include('form.conges.modals.delete')
@include('form.conges.modals.calendar')
@include('form.conges.modals.valide')

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function openCreateModal() {
        $('#createModal').modal('show');
    }

    function openModal(modalId) {
        $('#' + modalId).modal('show');
    }

    $(document).ready(function () {
        // Charger dynamiquement le contenu du modal pour les demandes validées
        $('.demandeValideBtn').on('click', function () {
            var congeId = $(this).data('conge-id');
            $.ajax({
                url: "{{ route('conges.valides', ['conge' => '']) }}/" + congeId,
                type: "GET",
                success: function (data) {
                    $('#demandesValidesModal .modal-body').html(data);
                    $('#demandesValidesModal').modal('show');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection
