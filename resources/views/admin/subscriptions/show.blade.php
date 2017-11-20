@extends('admin.layout')

@section('title', $subscription->name)

@section('main')

    <header class="admin-header">
        <h1>{{ $subscription->name }}</h1>

        <a href="{{ route('admin.subscriptions.edit', $subscription) }}" class="button edit small" role="button">@lang('actions.edit')</a>
    </header>

    <h2>Prossime prenotazioni</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ trans_choice('models.user', 1) }}</th>
                <th>Inizio</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscription->reservations()->active()->orderBy('starts_at')->get() as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }}</td>
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
            @forelse($subscription->reservations()->ended()->orderBy('starts_at', 'desc')->get() as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }}</td>
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
