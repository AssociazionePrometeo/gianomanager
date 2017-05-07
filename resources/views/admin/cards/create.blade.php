@extends('admin.layout')

@section('title', 'Nuova tessera')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Utenti' => route('admin.cards.index'),
        'Nuova tessera',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Crea una nuova tessera</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.cards.store', 'method' => 'post', 'class' => 'form', 'id' => 'form-edit']) !!}
        @include('admin.cards.form')
    {!! Form::close() !!}
@endsection
