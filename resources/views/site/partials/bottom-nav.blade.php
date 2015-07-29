@if($items->count() > 0)
    <h5 class="white-text">Инфо</h5>
    <ul>
        @foreach($items as $item)
            <?php
            $uri = '/' . trim(Request::path(), '/');
            ?>
            <li class="{{ isset($menu_item_active) && $menu_item_active == $item->active_item ? 'active' : ($uri == $item->url) ? 'active' : '' }}">
                <a class="" href="{{ $item->url }}" {{ $item->on_blank == 1 ? 'target="_blank"' : '' }}>
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endif