@extends('layouts.app')

@section('page-title', 'Liste des Types de Contrats')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Liste des types de contrats</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Créer un type de contrat</button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="typeContratsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom du type de contrat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($typeContrats as $typeContrat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $typeContrat->nom }}</td>
                                <td>
                                    <a href="{{ route('typeContrats.show', $typeContrat->id) }}" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $typeContrat->id }}">
                                        <i class="fas fa-eye"></i> <!-- Eye icon for detail -->
                                    </a>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $typeContrat->id }}">
                                        <i class="fas fa-edit"></i> <!-- Edit icon for modify -->
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $typeContrat->id }}">
                                        <i class="fas fa-trash-alt"></i> <!-- Trash icon for delete -->
                                    </button>
                                </td>
                            </tr>

                            <!-- Show Modal -->
                            @include('form.typeContrats.show', ['typeContrat' => $typeContrat])

                            <!-- Edit Modal -->
                            @include('form.typeContrats.edit', ['typeContrat' => $typeContrat])

                            <!-- Delete Modal -->
                            @include('form.typeContrats.delete', ['typeContrat' => $typeContrat])
                        @endforeach
                    </tbody>
                </table>

                <!-- Create Modal -->
                @include('form.typeContrats.create')
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection
