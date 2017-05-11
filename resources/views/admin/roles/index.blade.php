@extends('admin.layout')

@section('title', trans_choice('models.role', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.role', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.role_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\Role::class)
            <a href="{{ route('admin.roles.create') }}" class="button primary outline" role="button">
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
            <th>@lang('models.name')</th>
            <th class="actions"><span>@lang('actions.actions')</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td class="actions">
                    @can('update', $role)
                    @if(!$role->isProtected())
                        <a href="{{ route('admin.roles.edit', $role) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                    @endif
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
