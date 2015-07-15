<h3>Категории</h3>
<ul>
    @foreach($categories as $category)
        <li>
            <a href="#{{ $category->id }}">{{ $category->title }}</a>
        </li>
    @endforeach
</ul>