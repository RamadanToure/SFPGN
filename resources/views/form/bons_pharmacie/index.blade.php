@extends('layouts.app')

@section('page-title', 'Gestion des Bons de Pharmacie')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion des Bons de Pharmacie</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table id="bonsPharmacieTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th class="text-center">N°</th>
                            <th>Employé</th>
                            <th class="text-center">Date d'émission</th>
                            <th class="text-center" >Montant</th>
                            <th >Description</th>
                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bonsPharmacie as $bonPharmacie)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $bonPharmacie->employe->nom }}</td>
                                <td class="text-center">{{ $bonPharmacie->date_emission }}</td>
                                <td class="text-center">{{ $bonPharmacie->montant }}</td>
                                <td>{{ $bonPharmacie->description }}</td>
                                @include('options.bon')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



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
</script>
@endsection
