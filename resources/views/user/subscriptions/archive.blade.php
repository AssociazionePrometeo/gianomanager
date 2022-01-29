@extends('layout')

@section('title', trans_choice('models.subscription', 2))

@section('heading')
<h1>{{ trans_choice('models.subscription', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.subscription_list_archived')</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('subscriptions.index') }}" class="button primary outline" role="button">
              @lang('models.subscription')
            </a>
            <a href="{{ route('subscriptions.create') }}" class="button primary outline" role="button">
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
                <th>{{ trans_choice('models.subscription', 1) }}</th>
                <th>@lang('models.subscription_starts_at')</th>
                <th>@lang('models.subscription_ends_at')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->subscriptions as $subscription)
            @continue($subscription->ends_at >= new DateTime())
                <tr>
                    <td>{{ $subscription->id }}</td>
                    <td>{{ $subscription->subscription->name }}</td>
                    <td>{{ $subscription->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $subscription->ends_at->format('j F Y – H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
