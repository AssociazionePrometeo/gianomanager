@extends('admin.layout')

@section('title', 'Nuova risorsa')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Risorse' => route('admin.resources.index'),
        'Nuova risorsa',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Crea una nuova risorsa</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.resources.store', 'method' => 'post', 'id' => 'form-edit']) !!}

    @include('admin.resources.form')

    {!! Form::close() !!}
@endsection
