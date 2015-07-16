<div class="collection">
    <a href="{{ route('index') }}"
       class="collection-item">
        Все
        ({{ $posts_count }})
    </a>
    @foreach($categories as $category)
        <a href="{{ route('category', ['slug' => $category->slug]) }}" class="collection-item {{ (isset($active_category) && $active_category == $category->id) ? 'active' : '' }}">
            {{ $category->title }}
            ({{ $category->num }})
        </a>
    @endforeach
</div>