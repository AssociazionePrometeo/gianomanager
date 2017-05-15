@extends('admin.layout')

@section('title', $user->name)

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.user', 2) => route('admin.users.index'),
        'Mostra utente',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <nav class="tabs" data-component="tabs">
                <ul>
                    <li class="active"><a href="#profile">{{ __('user.profile') }}</a></li>
                    <li><a href="#reservations">{{ trans_choice('models.reservation', 2) }}</a></li>
                </ul>
            </nav>
        </div>
        <div class="col push-right button-group">
            @if(!$user->validated)
                @can('validate', $user)
                    <button class="button validate"
                            onclick="document.getElementById('form-validate').submit()">@lang('actions.validate')</button>
                @endcan
            @endif
            @can('edit', $user)
                <a href="{{ route('admin.users.edit', $user) }}" class="button edit">@lang('actions.edit')</a>
            @endcan
        </div>
    </div>
@endsection

@section('content')

    <div id="profile">
        <table>
            <tr>
                <th>@lang('models.name')</th>
                <td class="w80">{{ $user->name }}</td>
            </tr>
            <tr>
                <th>@lang('models.email')</th>
                <td>
                    {{ $user->email }}
                    &nbsp;
                    <span class="label outline {{ $user->email_verified ? 'success' : 'warning' }}">
                            {{ $user->email_verified ? __('models.user_email_verified') : __('models.user_email_unverified') }}
                        </span>
                </td>
            </tr>
            <tr>
                <th>@lang('models.phone_number')</th>
                <td>{{ $user->phone_number }}</td>
            </tr>
            <tr>
                <th>@lang('models.user_expires_at')</th>
                <td>{{ $user->expires_at ? $user->expires_at->formatLocalized('%x') : '—' }}</td>
            </tr>
            <tr>
                <th>@lang('models.status')</th>
                <td><span class="label {{ $user->active ? 'success' : 'warning' }}">
                        {{ $user->getStatusLabel() }}
                    </span></td>
            </tr>
            <tr>
                <th>{{ trans_choice('models.role', 2)}}</th>
                <td>
                    @foreach($user->roles as $role)
                        <span class="label outline">{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
        </table>
    </div>

    <div id="reservations">
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

    {!! Form::open(['route' => ['admin.users.validate', $user], 'method' => 'post', 'id' => 'form-validate']) !!}
    {!! Form::close() !!}

@endsection
