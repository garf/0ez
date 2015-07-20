<ul class="list-group">
    <li class="list-group-item">
        <span class="badge">{{ $posts_count }}</span>
        <a href="{{ route('index') }}"
           class="collection-item">
            Все
        </a>
    </li>
    @foreach($categories as $category)
    <li class="list-group-item">
        <span class="badge">{{ $category->num }}</span>
        <a href="{{ route('category', ['slug' => $category->slug]) }}" class="collection-item {{ (isset($active_category) && $active_category == $category->id) ? 'active' : '' }}">
            {{ $category->title }}
        </a>
    </li>
    @endforeach
</ul>