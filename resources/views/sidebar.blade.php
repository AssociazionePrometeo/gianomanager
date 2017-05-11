
<div class="sidebar-heading">
    <a href="/" class="site-name text-center">{{ config('app.name') }}</a>
</div>

<div class="sidebar-content">
    @if(Auth::check())
    <nav class="sidebar-navigation">
        <p class="navigation-title"></p>
        <ul>
            <li><a href="{{ route('profile') }}"><i class="material-icons">account_circle</i>@lang('user.profile')</a></li>
            <li><a href="{{ route('reservations.index') }}"><i class="material-icons">event</i> {{ trans_choice('models.reservation', 2) }}</a></li>
            <li><a href="{{ route('cards.index') }}"><i class="material-icons">credit_card</i> {{ trans_choice('models.card', 2) }}</a></li>
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
            <li><a href="{{ route('admin.resources.index') }}"><i class="material-icons">widgets</i>{{ trans_choice('models.resource', 2) }}</a></li>
            @endcan
            @can('view', App\Reservation::class)
            <li><a href="{{ route('admin.reservations.index') }}"><i class="material-icons">event</i> {{ trans_choice('models.reservation', 2) }}</a></li>
            @endcan
            @can('view', App\Card::class)
            <li><a href="{{ route('admin.cards.index') }}"><i class="material-icons">credit_card</i> {{ trans_choice('models.card', 2) }}</a></li>
            @endcan
            @can('view', App\User::class)
            <li><a href="{{ route('admin.users.index') }}"><i class="material-icons">group</i> {{ trans_choice('models.user', 2) }}</a></li>
            @endcan
            @can('view', App\Role::class)
            <li><a href="{{ route('admin.roles.index') }}"><i class="material-icons">group_work</i> {{ trans_choice('models.role', 2) }}</a></li>
            @endcan
        </ul>
        @endif
    </nav>
    @endif
</div>
