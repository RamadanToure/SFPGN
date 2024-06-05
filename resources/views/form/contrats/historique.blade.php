
@extends('layouts.app')

@section('content')
    <h1>Historique des Modifications du Contrat</h1>

    <ul>
        @foreach($contrat->historique as $modification)
            <li>
                <strong>Modification:</strong> {{ $modification['modification'] }}
                <br>
                <strong>Date:</strong> {{ $modification['timestamp'] }}
            </li>
        @endforeach
    </ul>
@endsection
