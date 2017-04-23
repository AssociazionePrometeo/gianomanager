@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pannello Utente</div>

                  <div class="panel-body">
                  <form action="{{ route('user.profile.update', $user) }}" method="post">
                      {{ method_field('PUT') }}
                      {{ csrf_field() }}


                    <div class="col-md-6">
                      <label for="name">Nome : {{ old('name') }}</label>
                    </div>

                    <div class="col-md-6">
                      @include('form.error', ['field' => 'email'])
                      <label for="email">Email</label>
                      <input type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6">
                      @include('form.error', ['field' => 'phone_number'])
                      <label for="phone_number">Numero di telefono</label>
                      <input type="phone" name="phone_number" value="{{ old('phone_number') }}">
                    </div>

                    <div class="col-md-6">
                      <label for="created_at">Data di iscrizione : {{ old('created_at') }}</label>
                    </div>

                    <div class="col-md-6">
                      <label for="expires_at">Data di scadenza: {{ old('expires_at') }}</label>
                    </div>

                    <div class="col-md-6">
                      @include('form.error', ['field' => 'password'])
                      <label for="password">Password</label>
                      <input type="password" name="password">
                    </div>

                    <div class="col-md-6">

                      <label for="active">Verificato: @if (old('active') == "1") "SI" @endif</label>
                    </div>

                    <div class="col-md-6">
                      <button type="submit">Salva</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
