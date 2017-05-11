@extends('admin.layout')

@section('title', 'Nuovo ruolo')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Ruoli' => route('admin.roles.index'),
        'Nuovo ruolo',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Crea un nuovo ruolo</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <form action="{{ route('admin.roles.store') }}" method="post" class="form" id="form-edit">
            {{ csrf_field() }}

            @include('admin.roles.form')

            <input type="submit" id="save" class="hide">
        </form>
    </div>
@endsection

