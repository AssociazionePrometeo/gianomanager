@extends('admin.layout')

@section('title', trans_choice('models.resource', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.resource', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.resource_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\Resource::class)
            <a href="{{ route('admin.resources.create') }}" class="button primary outline" role="button">
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
                <th>@lang('models.status')</th>
                <th class="actions"><span>@lang('actions.actions')</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($resources as $resource)
                <tr>
                    <td><span class="monospace">{{ $resource->id }}</span></td>
                    <td>{{ $resource->name }}</td>
                    <td><span class="label {{ $resource->active ? 'success' : 'default' }}">{{ $resource->status }}</span></td>
                    <td class="actions">
                        @can('update', $resource)
                        <a href="{{ route('admin.resources.edit', $resource) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
