@extends('admin.layout')

@section('title', trans_choice('models.subscription', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.subscription', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.subscription_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\subscription::class)
            <a href="{{ route('admin.subscriptions.create') }}" class="button primary outline" role="button">
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
            @foreach($subscriptions as $subscription)
                <tr>
                    <td><span class="monospace">{{ $subscription->id }}</span></td>
                    <td>{{ $subscription->name }}</td>
                    <td><span class="label {{ $subscription->active ? 'success' : 'default' }}">{{ $subscription->status }}</span></td>
                    <td class="actions">
                        @can('update', $subscription)
                        <a href="{{ route('admin.subscriptions.edit', $subscription) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
