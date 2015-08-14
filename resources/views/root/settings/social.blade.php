@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        {!! Form::open(['url' => route('root-settings-social-save'), 'method' => 'post']) !!}
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <legend>
                                <i class="fa {{ $service['icon'] }}" style="color: {{ $service['color'] }};"></i>
                                {{ $service['title'] }}
                            </legend>
                            <div>
                                <div class="form-group">
                                    <label for="input{{ ucfirst($service['name']) }}Link">Link</label>
                                    <input type="text"
                                           name="{{ $service['name'] }}_link"
                                           id="input{{ ucfirst($service['name']) }}Link"
                                           class="form-control"
                                           value="{{ Conf::get('social.' . $service['name'] . '.link', '') }}" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                @endforeach
            </div>
            <div class="text-right">
                <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        {!! Form::close() !!}
    </div>
@stop