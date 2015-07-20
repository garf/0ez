<nav>
    <ul class="pagination">
    @if ($previous)
        <li><a href="{{ $previous }}">Новые</a></li>
    @else
        <li class="disabled"><span>Новые</span></li>
    @endif
    @foreach ($links as $page => $url)
        @if ($page == $current)
            <li class="active"><span>{{ $page }}</span></li>
        @elseif($url)
            <li><a href="{{ $url }}">{{ $page }}</a></li>
        @else
            <li class="disabled"><span>-</span></li>
        @endif
    @endforeach
    @if ($next)
        <li><a href="{{ $next }}">Старые</a></li>
    @else
        <li class="disabled"><span>Старые</span></li>
    @endif
    </ul>
</nav>