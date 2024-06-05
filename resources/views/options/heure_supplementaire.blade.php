    <td class="text-center">
        <div class="btn-group">
            <button type="button" class="btn btn dropdown-toggle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars me-2"></i>
            </button>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#showModal{{ $heureSupplementaire->id }}">
                    <i class="fas fa-eye"></i> Voir
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="fas fa-plus"></i> Créer
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $heureSupplementaire->id }}">
                    <i class="fas fa-edit"></i> Modifier
                </a>

                <!-- Ajoutez d'autres options ici -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $heureSupplementaire->id }}">
                    <i class="fas fa-trash-alt"></i> Supprimer
                </a>
            </div>
        </div>
    </td>

    <!-- Modals -->
    @include('partials.action_heure_supplementaire', ['heureSupplementaire' => $heureSupplementaire])
