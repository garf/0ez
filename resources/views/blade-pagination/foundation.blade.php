<ul class="pagination">
    @if ($previous)
        <li class="arrow"><a href="{{ $previous }}">Новые</a></li>
    @else
        <li class="arrow unavailable"><a href="#!">Новые</a></li>
    @endif
    @foreach ($links as $page => $url)
        @if ($page == $current)
            <li class="current"><a href="#!">{{ $page }}</a></li>
        @elseif($url)
            <li><a href="{{ $url }}">{{ $page }}</a></li>
        @else
            <li class="unavailable"><a href="#!">-</a></li>
        @endif
    @endforeach
    @if ($next)
        <li class="arrow"><a href="{{ $next }}">Старые</a></li>
    @else
        <li class="arrow unavailable"><span>Старые</span></li>
    @endif
</ul>