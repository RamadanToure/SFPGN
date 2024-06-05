<!-- resources/views/evaluations/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des Évaluations du Personnel</h1>

    @foreach($evaluations as $evaluation)
        <div>
            <p><strong>Employé ID:</strong> {{ $evaluation->employe_id }}</p>
            <p><strong>Note:</strong> {{ $evaluation->note }}</p>
            <p><strong>Commentaire:</strong> {{ $evaluation->commentaire }}</p>
        </div>
        <hr>
    @endforeach
@endsection
