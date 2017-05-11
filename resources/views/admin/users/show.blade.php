@extends('admin.layout')

@section('title', $user->name)

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'trans_choice('models.user', 2)' => route('admin.users.index'),
        'Mostra utente',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>{{ $user->name }}</p>
        </div>
        <div class="col push-right button-group">
            <a href="{{ route('admin.users.edit', $user) }}" class="button edit">@lang('actions.edit')</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <div class="col col-6">
            <h2 class="small">Prenotazioni</h2>
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
                @foreach($user->reservations()->orderBy('starts_at')->get() as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->resource->name }}</td>
                        <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                        <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col col-6">

        </div>
    </div>
@endsection
