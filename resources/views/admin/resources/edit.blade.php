@extends('admin.layout')

@section('title', 'Modifica risorsa')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Risorse' => route('admin.resources.index'),
        'Modifica risorsa',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica risorsa <em>{{ $resource->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $resource)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($resource, [
        'route' => ['admin.resources.update', $resource],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('admin.resources.form')

    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.resources.destroy', $resource], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}

@endsection
