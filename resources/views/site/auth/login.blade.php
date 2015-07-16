@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l4 offset-l4">
                {!! Form::open(['route' => 'login']) !!}
                <h5>Sign In</h5>

                <div class="input-field">
                    <input id="email" type="text" class="validate" name="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Password</label>
                </div>
                <p>
                    <input type="checkbox" id="remember" name="remember"/>
                    <label for="remember">Remeber me</label>
                </p>
                <div class="right-align">
                    <button class="btn waves-effect waves-light" type="submit" >
                        Log In
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col s12 m12 l4"></div>
        </div>

    </div>
@stop