@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pannello Utente</div>

<<<<<<< HEAD
<<<<<<< HEAD
                <div class="panel-body">
                  <form action="{{ route('profile.update') }}" method="post">
=======
                  <div class="panel-body">
                  <form action="{{ route('user.profile.update', $user) }}" method="post">
>>>>>>> add row user profile page and corrected a /home route
=======
                <div class="panel-body">
                  <form action="{{ route('profile.update') }}" method="post">
>>>>>>> simple user profile page
                      {{ method_field('PUT') }}
                      {{ csrf_field() }}


                    <div class="col-md-6">
<<<<<<< HEAD
<<<<<<< HEAD
                      <label for="name">Nome : {{ old('name', $user->name) }}</label>
=======
                      <label for="name">Nome : {{ old('name') }}</label>
>>>>>>> add row user profile page and corrected a /home route
=======
                      <label for="name">Nome : {{ old('name', $user->name) }}</label>
>>>>>>> simple user profile page
                    </div>

                    <div class="col-md-6">
                      @include('form.error', ['field' => 'email'])
                      <label for="email">Email</label>
<<<<<<< HEAD
<<<<<<< HEAD
                      <input type="email" name="email" value="{{ old('email', $user->email) }}">
=======
                      <input type="email" name="email" value="{{ old('email') }}">
>>>>>>> add row user profile page and corrected a /home route
=======
                      <input type="email" name="email" value="{{ old('email', $user->email) }}">
>>>>>>> simple user profile page
                    </div>

                    <div class="col-md-6">
                      @include('form.error', ['field' => 'phone_number'])
                      <label for="phone_number">Numero di telefono</label>
<<<<<<< HEAD
<<<<<<< HEAD
                      <input type="phone" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                    </div>

                    <div class="col-md-6">
                      <label for="created_at">Data di iscrizione : {{ old('created_at', $user->created_at) }}</label>
                    </div>

                    <div class="col-md-6">
                      <label for="expires_at">Data di scadenza: {{ old('expires_at', $user->expires_at) }}</label>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
=======
                      <input type="phone" name="phone_number" value="{{ old('phone_number') }}">
=======
                      <input type="phone" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
>>>>>>> simple user profile page
                    </div>

                    <div class="col-md-6">
                      <label for="created_at">Data di iscrizione : {{ old('created_at', $user->created_at) }}</label>
                    </div>

                    <div class="col-md-6">
                      <label for="expires_at">Data di scadenza: {{ old('expires_at', $user->expires_at) }}</label>
                    </div>

<<<<<<< HEAD
                    <div class="col-md-6">
                      @include('form.error', ['field' => 'password'])
                      <label for="password">Password</label>
                      <input type="password" name="password">
>>>>>>> add row user profile page and corrected a /home route
=======
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
>>>>>>> simple user profile page
                    </div>

                    <div class="col-md-6">

<<<<<<< HEAD
<<<<<<< HEAD
                      <label for="active">Verificato: @if (old('active', $user->active) == "1") SI @else NO @endif</label>
=======
                      <label for="active">Verificato: @if (old('active') == "1") "SI" @endif</label>
>>>>>>> add row user profile page and corrected a /home route
=======
                      <label for="active">Verificato: @if (old('active', $user->active) == "1") SI @else NO @endif</label>
>>>>>>> simple user profile page
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
