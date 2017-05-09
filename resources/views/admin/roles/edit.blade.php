@extends('admin.layout')

@section('title', 'Modifica ruolo')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Ruoli' => route('admin.roles.index'),
        'Modifica ruolo',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica ruolo <em>{{ $role->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.roles.update', $role) }}" method="post" class="form" id="form-edit">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-item">
            @include('form.error', ['field' => 'id'])
            <label for="id">Identificatore</label>
            <input type="text" name="id" value="{{ old('id', $role->id) }}">
        </div>

        <div class="form-item">
            @include('form.error', ['field' => 'name'])
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ old('name', $role->name) }}">
        </div>

        <input type="submit" id="save" class="hide">
    </form>

    {!! Form::open(['route' => ['admin.roles.destroy', $role], 'method' => 'delete', 'id' => 'form-delete']) !!}
    <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
