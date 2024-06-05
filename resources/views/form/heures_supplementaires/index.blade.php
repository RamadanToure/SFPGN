@extends('layouts.app')

@section('page-title', 'Gestion des Heures Supplémentaires')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des heures supplémentaires</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table id="heuresSupplementairesTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th  class="text-center">N°</th>
                            <th>Employé</th>
                            <th  class="text-center">Nombre d'heures</th>
                            <th  class="text-center">Date</th>
                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($heuresSupplementaires as $heureSupplementaire)
                            <tr>
                                <td  class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $heureSupplementaire->employe->nom }}</td>
                                <td  class="text-center">{{ $heureSupplementaire->nombre_heures }}</td>
                                <td  class="text-center">{{ $heureSupplementaire->date_heure_supplementaire }}</td>
                                @include('options.heure_supplementaire')
                                {{-- <td>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal{{ $heureSupplementaire->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $heureSupplementaire->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $heureSupplementaire->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



{{-- @endsection

@section('scripts')
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openCreateModal() {
            $('#createModal').modal('show');
        }
    </script> --}}
@endsection
