<div class="list-group">

        <a href="{{ route('index') }}"
           class="list-group-item {{ (!isset($active_category) ? 'active' : '') }}">
            Все
            <span class="badge">{{ $posts_count }}</span>
        </a>
    @foreach($categories as $category)

        <a href="{{ route('category', ['slug' => $category->slug]) }}"
           class="list-group-item {{ (isset($active_category) && $active_category == $category->id) ? 'active' : '' }}">
            {{ $category->title }}
            <span class="badge">{{ $category->num }}</span>
        </a>
    @endforeach
</div>