@extends('admin.layout')

@section('title', 'Modifica utente')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Utenti' => route('admin.users.index'),
        'Crea utente',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Crea un nuovo utente</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-12">
            {!! Form::open(['route' => 'admin.users.store', 'method' => 'post', 'id' => 'form-edit']) !!}

                @include('admin.users.form')
                <input type="submit" id="save" class="hide">
            {!! Form::close() !!}
        </div>
    </div>

@endsection


