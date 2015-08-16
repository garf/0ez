<div class="list-group">
    @foreach($items as $item)
        <a class="list-group-item {{ (Route::is($item['route'])) ? 'active' : '' }}" href="{{ $item['url'] }}">
            <i class="fa {{ $item['icon'] }}"></i> {{ $item['title'] }}
        </a>
    @endforeach
</div>