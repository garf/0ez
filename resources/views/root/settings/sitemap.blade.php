@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-md-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-md-9">
                <div class="well well-sm">
                    <a href="{{ route('root-settings-sitemap-generate') }}" class="btn btn-info">Generate Sitemap</a>
                </div>
                @if($sitemap_exists)
                    <div class="list-group">
                        <a href="{{ starts_with(Conf::get('app.url'), ['http://', 'https://']) ? '' : 'http://' }}{{ Conf::get('app.url') }}/{{ $sitemap_filename }}"
                           class="list-group-item" target="_blank">
                            <i class="fa fa-file-code-o text-danger"></i> {{ Conf::get('app.url') }}/{{ $sitemap_filename }}
                        </a>
                    </div>
                @else
                    <div class="alert alert-warning">Sitemap doesn't exist. You have to press "Generate Sitemap" button.</div>
                @endif

                <form action="{{ route('root-settings-sitemap-save') }}" method="post">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="inputFilename">Sitemap Filename</label>
                        <div class="input-group">
                            <div class="input-group-addon">{{ starts_with(Conf::get('app.url'), ['http://', 'https://']) ? '' : 'http://' }}{{ Conf::get('app.url') }}/</div>
                            <input type="text" class="form-control" id="inputFilename" name="sitemap_filename" value="{{ $sitemap_filename or Input::old('sitemap_filename') }}">
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                        <input type="submit" value="SAVE" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <hr />
        <div class="alert alert-info">
            Sitemap generates automatically hourly if you set cron job correclty.
        </div>
    </div>
@stop