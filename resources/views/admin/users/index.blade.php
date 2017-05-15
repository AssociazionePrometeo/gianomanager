@extends('admin.layout')

@section('title', trans_choice('models.user', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.user', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.user_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\User::class)
            <a href="{{ route('admin.users.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                @lang('actions.add_new')
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>@lang('models.name')</th>
            <th>@lang('models.email')</th>
            <th>@lang('models.status')</th>
            <th class="actions"><span>@lang('actions.actions')</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="label {{ $user->active ? 'success' : 'default' }}">
                        {{ $user->getStatusLabel() }}
                    </span>
                </td>
                <td class="actions">
                    @can('view', $user)
                    <a href="{{ route('admin.users.show', $user) }}" class="button small" role="button">@lang('actions.show')</a>
                    @endcan
                    @can('update', $user)
                    <a href="{{ route('admin.users.edit', $user) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
