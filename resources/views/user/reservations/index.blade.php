@extends('layout')

@section('title', 'Prenotazioni')

@section('heading')
<h1>Prenotazioni</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista prenotazioni</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('reservations.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                Aggiungi nuova
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>Risorsa</th>
                <th>Inizio prenotazione</th>
                <th>Fine prenotazione</th>
                <th class="actions"><span>Azioni</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                    <td class="actions">
                        <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
                    </td>
                </tr>
                {!! Form::open(['route' => ['reservations.destroy', $reservation], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}
            @endforeach
        </tbody>
    </table>
@endsection
