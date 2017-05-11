<nav>
    <ul class="user-menu">
        <li>
            <a href="" data-component="dropdown" data-target="#dropdown-fixed">
                {{ Auth::user()->name }}
                <span class="caret down"></span>
            </a>
        </li>
    </ul>
    <div class="dropdown hide" id="dropdown-fixed">
        <ul>
            <li><a href="{{ route('profile') }}">@lang('user.profile')</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('user.logout')</a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="post" class="hide">
            {{ csrf_field() }}
        </form>
    </div>
</nav>