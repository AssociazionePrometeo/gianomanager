<nav class="breadcrumbs">
    <ul>
        <li><a href="{{ route('admin.users.index') }}">Admin</a></li>
        @foreach($items as $label => $url)
            <li>
                @if(is_numeric($label))
                    <span>{{ $url }}</span>
                @else
                    <a href="{{ $url }}">{{ $label }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>