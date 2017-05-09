@extends('layout')

@section('heading')
    <h1>Profilo</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica il tuo profilo</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')


    <div class="row">
        <div class="col col-12">

            {!! Form::model($user, ['route' => 'profile.update', 'method' => 'put', 'id' => 'form-edit', 'class' => 'form']) !!}

                @include('form.item', [
                    'name' => 'name',
                    'label' => 'Nome',
                    'field' => Form::text('name', null, ['disabled'])
                ])

                @include('form.item', [
                    'name'  => 'email',
                    'label' => 'Email',
                    'field' => Form::email('email'),
                ])

                @include('form.item', [
                    'name'  => 'phone_number',
                    'label' => 'Numero di telefono',
                    'field' => Form::text('phone_number')
                ])

                @include('form.item', [
                    'name'  => 'expires_at',
                    'label' => 'Data di scadenza',
                    'field' => Form::date('expires_at', null, ['disabled']),
                ])

                @include('form.item', [
                    'name'  => 'password',
                    'label' => 'Password',
                    'field' => Form::password('password'),
                    'desc' => 'Lascia vuoto per mantenere quella attuale',
                ])

                @include('form.item', [
                    'name'  => 'password_confirmation',
                    'label' => 'Conferma password',
                    'field' => Form::password('password_confirmation'),
                ])

                <div class="form-item">
                    <label>Stato
                        <span class="label {{ $user->active ? 'success' : 'warning' }}">
                                {{ $user->active ? 'Verificato' : 'In attesa di verifica' }}
                            </span>
                    </label>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
