<div class="">
    <nav class="navbar navbar-inverse ">
        <div class="container container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">{{ Conf::get('app.sitename') }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach($items as $item)
                        <?php
                            $uri = '/' . trim(Request::path(), '/');
                        ?>
                        <li class="{{ isset($menu_item_active) && $menu_item_active == $item->active_item ? 'active' : ($uri == $item->url) ? 'active' : '' }}">
                            <a href="{{ $item->url }}" {{ $item->on_blank == 1 ? 'target="_blank"' : '' }}>
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>
