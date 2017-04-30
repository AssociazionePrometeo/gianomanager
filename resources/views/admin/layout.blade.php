@extends('layout')

@section('title.suffix', '— Admin')

@section('navigation')
<nav id="navigation">
    <div class="container row">
        <div class="col push-left">
            <h4 class="site-title push-left">Giano</h4>
            <ul class="col primary">
                <li><a href="{{ route('admin.resources.index') }}">Risorse</a></li>
                <li><a href="{{ route('admin.reservations.index') }}">Prenotazioni</a></li>
                <li><a href="{{ route('admin.cards.index') }}">Tessere</a></li>
                <li><a href="{{ route('admin.users.index') }}">Utenti</a></li>
                <li><a href="{{ route('admin.roles.index') }}">Ruoli</a></li>
            </ul>
        </div>
        <div class="col push-right">
            <ul class="secondary">
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Esci</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
    </div>
</nav>
@endsection

@section('main')

@endsection
