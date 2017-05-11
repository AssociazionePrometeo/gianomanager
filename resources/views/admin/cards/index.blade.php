@extends('admin.layout')

@section('title', trans_choice('models.card', 2))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [trans_choice('models.card', 2)]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.card_list')</p>
        </div>
        <div class="col push-right">
            @can('create', App\Card::class)
            <a href="{{ route('admin.cards.create') }}" class="button primary outline" role="button">
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
                <th>{{ trans_choice('models.user', 1) }}</th>
                <th>@lang('models.status')</th>
                <th class="actions"><span>@lang('actions.actions')</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)
                <tr>
                    <td><span class="monospace">{{ $card->id }}</span></td>
                    <td>{{ $card->user->name }}</td>
                    <td><span class="label {{ $card->active ? 'success' : 'default' }}">{{ $card->status }}</span></td>
                    <td class="actions">
                        @can('update', $card)
                        <a href="{{ route('admin.cards.edit', $card) }}" class="button edit small" role="button">@lang('actions.edit')</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection