@extends('layouts.app')

@section('page-title', 'Gestion des Sociétés')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des sociétés</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Créer une société</button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="societesTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom de la société</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Responsable</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($societes as $societe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $societe->nom }}</td>
                                <td>{{ $societe->adresse }}</td>
                                <td>{{ $societe->email }}</td>
                                <td>{{ $societe->telephone }}</td>
                                <td>{{ $societe->responsable }}</td>
                                <td>
                                    <a href="{{ route('societes.show', $societe->id) }}" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $societe->id }}">
                                        <i class="fas fa-eye"></i> <!-- Eye icon for detail -->
                                    </a>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $societe->id }}">
                                        <i class="fas fa-edit"></i> <!-- Edit icon for modify -->
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $societe->id }}">
                                        <i class="fas fa-trash-alt"></i> <!-- Trash icon for delete -->
                                    </button>
                                </td>
                            </tr>

                            {{-- <!-- Show Modal -->
                            @include('form.societe.show', ['societe' => $societe])

                            <!-- Edit Modal -->
                            @include('form.societe.edit', ['societe' => $societe])

                            <!-- Delete Modal -->
                            @include('form.societe.delete', ['societe' => $societe]) --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('form.societe.create')
            @include('form.societe.edit')
            @include('form.societe.delete')
            @include('form.societe.show')
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection
