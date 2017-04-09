@extends('admin.layout')

@section('title', 'Modifica prenotazione')

@section('main')

    <header class="admin-header">
        <h1>Modifica prenotazione</h1>

        <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="post" class="delete">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Elimina</button>
        </form>
    </header>

    <form action="{{ route('admin.reservations.update', $reservation) }}" method="post" class="main">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            @if ($errors->has('user'))
                <div class="error">{{ $errors->first('user') }}</div>
            @endif
            <label for="name">Utente</label>
            <select name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}"
                            {{ $user->id == old('user_id', $reservation->user->id) ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>

            @if ($errors->has('resource'))
                <div class="error">{{ $errors->first('resource') }}</div>
            @endif
            <label for="name">Risorsa</label>
            <select name="resource_id">
                @foreach ($resources as $resource)
                    <option value="{{ $resource->id }}"
                            {{ $resource->id == old('resource_id', $reservation->resource->id) ? 'selected' : '' }}>
                        {{ $resource->name }}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('start_date'))
                <div class="error">{{ $errors->first('start_date') }}</div>
            @endif
            @if ($errors->has('start_time'))
                <div class="error">{{ $errors->first('start_time') }}</div>
            @endif
            <label for="name">Inizio prenotazione</label>
            <input type="date" name="start_date" class="datepicker" value="{{ old('start_date', $reservation->start_date) }}">
            <input type="time" name="start_time" step="1800" value="{{ old('start_time', $reservation->start_time) }}">

            @if ($errors->has('end_date'))
                <div class="error">{{ $errors->first('end_date') }}</div>
            @endif
            @if ($errors->has('end_time'))
                <div class="error">{{ $errors->first('end_time') }}</div>
            @endif
            <label for="name">Fine prenotazione</label>
            <input type="date" name="end_date" class="datepicker" value="{{ old('end_date', $reservation->end_date) }}">
            <input type="time" name="end_time" step="1800" value="{{ old('end_time', $reservation->end_time) }}">

            <button type="submit">Salva</button>
    
    </form>
@endsection

@section('javascripts')
    @parent

    <script>
        // require(['jquery', 'datepicker', 'timepicker', 'picker_it'], function($) {
        //     $('input[name="from_date"]').pickadate({
        //         // min: new Date(),
        //         formatSubmit: 'yyyy-mm-dd',
        //         hiddenName: true
        //     });

        //     $('input[name="to_date"]').pickadate({
        //         min: new Date(),
        //         formatSubmit: 'yyyy-mm-dd',
        //         hiddenName: true
        //     });

        //     $('input[name="from_time"]').pickatime({
        //         min: [8, 00],
        //         max: [22, 00]
        //     });
            
        //     $('input[name="to_time"]').pickatime({
        //         min: [8, 00],
        //         max: [22, 00]
        //     });
        // });
    </script>

@endsection


@section('stylesheets')
    @parent

    <link rel="stylesheet" href="{{ asset('assets/lib/css/pickadate.css') }}">
@endsection