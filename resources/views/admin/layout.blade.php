@extends('layout')

@section('title.suffix', '— Admin')

@section('navigation')
<nav id="navigation">
    <div class="container">
        <ul class="primary">
            <li><a href="{{ route('admin.resources.index') }}">Risorse</a></li>
            <li><a href="{{ route('admin.reservations.index') }}">Prenotazioni</a></li>
            <li><a href="{{ route('admin.cards.index') }}">Tessere</a></li>
            <li><a href="{{ route('admin.users.index') }}">Utenti</a></li>
            <li><a href="{{ route('admin.roles.index') }}">Ruoli</a></li>
        </ul>
        <ul class="secondary">
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Esci</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        </ul>
    </div>
</nav>
@endsection

@section('main')

@endsection
