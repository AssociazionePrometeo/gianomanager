
<div class="sidebar-heading">
    <a href="/" class="site-name text-center">{{ config('app.name') }}</a>
</div>

<div class="sidebar-content">
    @if(Auth::check())
    <nav class="sidebar-navigation">
        <p class="navigation-title"></p>
        <ul>
            <li><a href="{{ route('profile') }}"><i class="material-icons">account_circle</i> Profilo</a></li>
            <li><a href="{{ route('reservations.index') }}"><i class="material-icons">event</i> Prenotazioni</a></li>
            <li><a href="{{ route('cards.index') }}"><i class="material-icons">credit_card</i> Tessere</a></li>
        </ul>

        <?php $u = Auth::user(); ?>
        @if($u->can('view', App\Resource::class)
            or $u->can('view', App\Reservation::class)
            or $u->can('view', App\Card::class)
            or $u->can('view', App\User::class)
            or $u->can('view', App\Role::class))
        <h6 class="navigation-title">Admin</h6>
        <ul class="admin-navigation">
            @can('view', App\Resource::class)
            <li><a href="{{ route('admin.resources.index') }}"><i class="material-icons">widgets</i> Risorse</a></li>
            @endcan
            @can('view', App\Reservation::class)
            <li><a href="{{ route('admin.reservations.index') }}"><i class="material-icons">event</i> Prenotazioni</a></li>
            @endcan
            @can('view', App\Card::class)
            <li><a href="{{ route('admin.cards.index') }}"><i class="material-icons">credit_card</i> Tessere</a></li>
            @endcan
            @can('view', App\User::class)
            <li><a href="{{ route('admin.users.index') }}"><i class="material-icons">group</i> Utenti</a></li>
            @endcan
            @can('view', App\Role::class)
            <li><a href="{{ route('admin.roles.index') }}"><i class="material-icons">group_work</i> Ruoli</a></li>
            @endcan
        </ul>
        @endif
    </nav>
    @endif
</div>
