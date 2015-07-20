@extends('root.main')

@section('body')
    <div class="container">
        <h1>Сводка</h1>
        <p>{{ auth()->user()->name }}</p>
    </div>
@stop