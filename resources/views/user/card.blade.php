@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Le tue Card</div>

                <table class="entities">
                    <thead>
                        <tr>
                            <th>ID</th>

                            <th class="actions"><span>Azioni</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>{{ $card->id }}</td>
                                <td class="actions">
                                    <a href="{{ route('card.lock', $card) }}" class="edit"> <button type="button" @if (old('status', $card->status) == "disabled") disabled @endif>Blocca</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
