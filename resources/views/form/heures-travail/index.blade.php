@extends('layouts.app')

@section('page-title', 'Suivi des Heures de Travail')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Suivi des heures de travail</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <table id="heuresTravailTable" class="table table-bordered table-hover">
                    <thead class="table-header-blue">
                        <tr>
                            <th>N°</th>
                            <th>Employé</th>
                            <th>Heure d'Entrée</th>
                            <th>Heure de Sortie</th>
                            <th class="text-center"><i class="fas fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($heuresTravail as $heure)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $heure->employe->nom }}</td>
                                <td>{{ $heure->heure_entree }}</td>
                                <td>{{ $heure->heure_sortie ?? 'Non enregistrée' }}</td>
                                @include('options.heure_travail')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Ajouter une entrée d'heures de travail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('heures-travail.store') }}" method="POST">
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
                        <label for="heure_entree">Heure d'Entrée :</label>
                        <input type="datetime-local" name="heure_entree" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="heure_sortie">Heure de Sortie :</label>
                        <input type="datetime-local" name="heure_sortie" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function openCreateModal() {
            var myModal = new bootstrap.Modal(document.getElementById('createModal'));
            myModal.show();
        }
    </script>
@endsection
