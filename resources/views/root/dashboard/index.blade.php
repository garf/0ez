@extends('root.main')

@section('body')
    <nav>
        <ul id="slide-out" class="side-nav">
            <li><a href="#!">First Sidebar Link</a></li>
            <li><a href="#!">Second Sidebar Link</a></li>
        </ul>

    </nav>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu">343</i></a>
    <div class="container">
        <h1>Root</h1>
        <p>{{ auth()->user()->name }}</p>
    </div>
@stop