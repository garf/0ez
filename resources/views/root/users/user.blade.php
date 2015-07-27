@extends('root.main')

@section('body')
    <div class="container">
        {!! Form::open(['url' => $save_url]) !!}
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="name" value="{{ $user->name or Input::old('name') }}" class="form-control" id="inputName">
        </div>
        <div class="form-group">
            <label for="inputEmail">E-mail</label>
            <input type="text" name="email" value="{{ $user->email or Input::old('email') }}" class="form-control" id="inputEmail">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="text" name="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="inputActive">Active?</label>
                    <br />
                    <input type="checkbox" name="active" data-toggle="switch" id="inputActive"
                            {{ empty($user) || $user->active ? 'checked' : '' }} >
                </div>
            </div>
            <div class="col-lg-3">
                <label for="inputSubmit">&nbsp;</label>
                <br />
                <input type="submit" value="Save" class="btn btn-success btn-block" >
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop