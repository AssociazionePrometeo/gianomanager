@extends('layout')

@section('heading')
    <h1>Profilo</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica profilo il tuo profilo</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')


    <div class="row">
        <div class="col col-12">

            <form action="{{ route('profile.update') }}" method="post" id="form-edit" class="form">
                {{ method_field('PUT') }}
                {{ csrf_field() }}


                <div class="">
                    <label for="name">Nome : {{ old('name', $user->name) }}</label>
                </div>

                <div class="">
                    @include('form.error', ['field' => 'email'])
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}">
                </div>

                <div class="">
                    @include('form.error', ['field' => 'phone_number'])
                    <label for="phone_number">Numero di telefono</label>
                    <input type="phone" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                </div>

                <div class="">
                    <label for="created_at">Data di iscrizione : {{ old('created_at', $user->created_at) }}</label>
                </div>

                <div class="">
                    <label for="expires_at">Data di scadenza: {{ old('expires_at', $user->expires_at) }}</label>
                </div>

                <div class="form-item{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-item">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                
                <div class="">
                    <label for="active">Verificato: @if (old('active', $user->active) == "1") SI @else NO @endif</label>
                </div>

            </form>

        </div>
    </div>
@endsection
