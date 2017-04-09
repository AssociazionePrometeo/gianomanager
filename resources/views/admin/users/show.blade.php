@extends('admin.layout')

@section('title', $user->name)

@section('main')
    <header class="admin-header">
        <h1>{{ $user->name }}</h1>
        
        <a href="{{ route('admin.users.edit', $user) }}" class="edit">Modifica</a>
    </header>
    
    <h2>Prossime prenotazioni</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Risorsa</th>
                <th>Inizio</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->reservations()->active()->orderBy('starts_at')->get() as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>

    <h2>Prenotazioni passate</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Risorsa</th>
                <th>Inizio</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user->reservations()->ended()->orderBy('starts_at', 'desc')->get() as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                </tr>
            @empty
                <tr class="empty">
                    <td colspan="4">Nessuna prenotazione</td>
                </tr>
            @endforelse
        </tbody>
    </table>


@endsection
