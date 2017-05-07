@extends('admin.layout')

@section('title', 'Modifica utente')

@section('main')
    <header class="admin-header">
        <div class="row">
            <h1>Modifica <em>{{ $user->name }}</em></h1>
            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="push-right">
                {{ method_field("DELETE") }}
                {{ csrf_field() }}
                <button type="submit" class="button delete">Elimina</button>
            </form>
        </div>
    </header>

    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put', 'class' => 'form']) !!}

        @include('admin.users.form')

        <div class="form-item">
            <button type="submit">Salva</button>
        </div>
    {!! Form::close() !!}


@endsection
