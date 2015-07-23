@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        {!! Form::open(['route' => 'root-counters-save']) !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ route('root-settings') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="inputGoogle">Google counter ID <span
                                class="text-muted">(i.e.: UA-12345678-1)</span></label>
                    <input type="text" name="google_analytics" id="inputGoogle" class="form-control"
                           value="{{ Conf::get('seo.counters.google_analytics', '') }}">
                </div>
                <div class="form-group">
                    <label for="inputYandex">Yandex Metrika ID <span
                                class="text-muted">(i.e.: 12345678)</span></label>
                    <input type="text" name="yandex_metrika" id="inputYandex" class="form-control"
                           value="{{ Conf::get('seo.counters.yandex_metrika', '') }}">
                </div>
                <div class="form-group">
                    <label for="inputMeta">Any Additional HTML Meta-Tags</label>
                    <textarea name="more_meta" id="inputMeta" class="form-control">{{ Conf::get('seo.more_meta', '') }}</textarea>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                <input type="submit" value="SAVE" class="btn btn-success"/>
            </div>
        {!! Form::close() !!}
    </div>
@stop