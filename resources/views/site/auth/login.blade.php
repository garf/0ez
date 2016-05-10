@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-4"></div>
            <div class="col-sm-12 col-md-8 col-lg-4">
                <form action="{{ route('login') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1>Sign In</h1></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="remember" name="remember"> Remeber me
                                </label>
                            </div>
                            <div>
                                {!! Notifications::byGroup('login')->toHTML() !!}
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">
                                    Log In
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-4"></div>
        </div>

    </div>
@stop