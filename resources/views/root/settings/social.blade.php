@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br />
        {!! Form::open(['url' => route('root-settings-social-save'), 'method' => 'post']) !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="showTitles" name="show_titles" {{ Conf::has('social.show_titles') ? 'checked' : '' }}> Show Link Titles
                        </label>
                    </div>
                </div>
            </div>
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
                                           value="{{ Conf::get('social.links.' . $service['name'], '') }}"
                                            />
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