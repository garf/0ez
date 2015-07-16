<div class="container">
    <nav class="">
        <div class="nav-wrapper">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a href="/">Dashboard</a></li>
                <li><a href="#!">Posts</a></li>
                <li><a href="#!">Categories</a></li>
                <li><a href="#!">Users</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="/">Dashboard</a></li>
                <li><a href="#!">Posts</a></li>
                <li><a href="#!">Categories</a></li>
                <li><a href="#!">Users</a></li>
                <div class="divider"></div>
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            </ul>
        </div>
    </nav>
</div>