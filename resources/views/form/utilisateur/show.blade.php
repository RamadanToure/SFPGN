@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil de {{ $utilisateur->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item active">Profil d'utilisateur</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Placez le contenu du profil de l'utilisateur ici -->
        <div class="row">
            <div class="col-md-6">
                <!-- Afficher les détails de l'utilisateur -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Détails de l'utilisateur</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><strong>Nom :</strong> {{ $utilisateur->name }}</li>
                            <li><strong>Email :</strong> {{ $utilisateur->email }}</li>
                            <!-- Ajoutez d'autres détails selon vos besoins -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Afficher l'image de l'utilisateur -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Image de l'utilisateur</h3>
                    </div>
                    <div class="card-body">
                        @if($utilisateur->image)
                            <img src="{{ asset('chemin/vers/le/dossier/des/images/' . $utilisateur->image) }}" alt="Image de l'utilisateur" class="img-fluid">
                        @else
                            <p>Aucune image disponible.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
