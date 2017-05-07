@extends('admin.layout')

@section('title', 'Modifica utente')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Utenti' => route('admin.users.index'),
        'Modifica utente',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica utente <em>{{ $user->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-12">
            {!! Form::model($user, [
                'route' => ['admin.users.update', $user],
                'method' => 'put',
                'class' => 'form',
                'id' => 'form-edit'
            ]) !!}
            @include('admin.users.form')
            <input type="submit" id="save" class="hide">
            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'delete', 'id' => 'form-delete']) !!}
    <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
