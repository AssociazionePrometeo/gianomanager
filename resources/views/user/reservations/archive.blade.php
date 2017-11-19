@extends('layout')

@section('title', trans_choice('models.reservation', 2))

@section('heading')
<h1>{{ trans_choice('models.reservation', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.reservation_list_archived')</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('reservations.index') }}" class="button primary outline" role="button">
              @lang('models.reservation')
            </a>
            <a href="{{ route('reservations.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                @lang('actions.add_new')
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ trans_choice('models.resource', 1) }}</th>
                <th>@lang('models.reservation_starts_at')</th>
                <th>@lang('models.reservation_ends_at')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->reservations as $reservation)
            @continue($reservation->ends_at >= new DateTime())
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
