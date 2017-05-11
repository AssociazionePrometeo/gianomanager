@extends('layout')

@section('title', trans_choice('models.card', 2))

@section('heading')
    <h1>{{ trans_choice('models.card', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <p>@lang('user.manage_cards')</p>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
        <tr>
            <th>@lang('models.card_code')</th>
            <th>@lang('models.status')</th>
            <th class="actions"><span>@lang('actions.actions')</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->cards as $card)
            <tr>
                <td><span class="monospace">{{ $card->id }}</span></td>
                <td><span class="label {{ $card->active ? 'success' : 'default' }}">{{ $card->active ? __('models.card_enabled') : __('models.card_disabled') }}</span></td>
                <td class="actions">
                    @if($card->active)
                        {!! Form::open(['route' => ['cards.lock', $card], 'method' => 'put']) !!}
                        <button class="button outline small delete lock" type="submit">@lang('user.lock_card')</button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['cards.unlock', $card], 'method' => 'put']) !!}
                        <button class="button outline small save unlock" type="submit">@lang('user.unlock_card')</button>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
