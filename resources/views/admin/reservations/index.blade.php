@extends('admin.layout')

@section('title', trans_choice('models.reservation', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.reservation', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.reservation_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\Reservation::class)
            <a href="{{ route('admin.reservations.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                @lang('actions.add_new')
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ trans_choice('models.resource', 1) }}</th>
                <th>{{ trans_choice('models.user', 1) }}</th>
                <th>@lang('models.reservation_starts_at')</th>
                <th>@lang('models.reservation_ends_at')</th>
                <th class="actions"><span>@lang('actions.actions')</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                    <td class="actions">
                        @can('update', $reservation)
                        <a href="{{ route('admin.reservations.edit', $reservation) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection