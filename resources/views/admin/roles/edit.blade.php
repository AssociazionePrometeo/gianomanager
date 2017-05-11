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
            @can('delete', $role)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'post', 'class' => 'form', 'id' => 'form-edit']) !!}
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('admin.roles.form')

        <input type="submit" id="save" class="hide">
    </form>

    {!! Form::open(['route' => ['admin.roles.destroy', $role], 'method' => 'delete', 'id' => 'form-delete']) !!}
    <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
