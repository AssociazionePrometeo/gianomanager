@extends('layout')

@section('title', trans_choice('models.reservation', 2))

@section('heading')
<h1>{{ trans_choice('models.reservation', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.reservation_list')</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('reservations.archive') }}" class="button secondary outline" role="button">
                @lang('actions.archive')
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
                <th class="actions"><span>@lang('actions.actions')</span></th>
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
                        <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
                    </td>
                </tr>
                {!! Form::open(['route' => ['reservations.destroy', $reservation], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}
            @endforeach
        </tbody>
    </table>
@endsection
