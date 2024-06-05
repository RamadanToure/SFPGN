<td class="text-center">
    <div class="btn-group">
        <button type="button" class="btn btn dropdown-toggle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars me-2"></i> <!-- Ajoutez une icône de lignes horizontales -->
        </button>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#actionModal{{ $paie->id }}-show">
                <i class="fas fa-eye"></i> Voir
            </a>

            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Créer
            </a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#actionModal{{ $paie->id }}-edit">
                <i class="fas fa-edit"></i> Modifier
            </a>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#actionModal{{ $paie->id }}-absences">
                <i class="fas fa-calendar-times"></i> Absences
            </a>

            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#actionModal{{ $paie->id }}-primes">
                <i class="fas fa-dollar-sign"></i> Primes
            </a>

            <!-- Ajoutez d'autres options ici -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#actionModal{{ $paie->id }}-delete">
                <i class="fas fa-trash-alt"></i> Supprimer
            </a>
        </div>
    </div>
</td>


<!-- Modals -->
@include('partials.action_paies', ['paie' => $paie])


