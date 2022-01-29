@extends('layout')

@section('title', trans_choice('models.subscription', 2))

@section('heading')
<h1>{{ trans_choice('models.subscription', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.subscription_list')</p>
        </div>
        </div>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>

        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
