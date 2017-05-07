
<div class="sidebar-heading">
    <a href="/" class="site-name text-center">{{ config('app.name') }}</a>
</div>

<div class="sidebar-content">
    @if(Auth::check())
    <nav class="sidebar-navigation">
        <p class="navigation-title"></p>
        <ul>
            <li><a href="{{ route('profile') }}"><i class="material-icons">account_circle</i> Profilo</a></li>
            <li><a href="{{ route('admin.reservations.index') }}"><i class="material-icons">event</i> Prenotazioni</a></li>
            <li><a href="{{ route('admin.reservations.index') }}"><i class="material-icons">credit_card</i> Tessere</a></li>
        </ul>

        <h6 class="navigation-title">Admin</h6>
        <ul class="admin-navigation">
            <li><a href="{{ route('admin.resources.index') }}"><i class="material-icons">widgets</i> Risorse</a></li>
            <li><a href="{{ route('admin.reservations.index') }}"><i class="material-icons">event</i> Prenotazioni</a></li>
            <li><a href="{{ route('admin.cards.index') }}"><i class="material-icons">credit_card</i> Tessere</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="material-icons">group</i> Utenti</a></li>
            <li><a href="{{ route('admin.roles.index') }}"><i class="material-icons">group_work</i> Ruoli</a></li>
        </ul>
    </nav>
    @endif
</div>
