@extends('layout')

@section('heading')
    <h1>Tessere</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <p>Gestisci le tue tessere</p>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
        <tr>
            <th>Codice tessera</th>
            <th>Stato</th>
            <th class="actions"><span>Azioni</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->cards as $card)
            <tr>
                <td><span class="monospace">{{ $card->id }}</span></td>
                <td><span class="label {{ $card->active ? 'success' : 'default' }}">{{ $card->active ? 'Abilitata' : 'Disabilitata' }}</span></td>
                <td class="actions">
                    @if($card->active)
                        {!! Form::open(['route' => ['cards.lock', $card], 'method' => 'put']) !!}
                        <button class="button outline small delete lock" type="submit">Blocca</button>
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['cards.unlock', $card], 'method' => 'put']) !!}
                        <button class="button outline small save unlock" type="submit">Abilita</button>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
