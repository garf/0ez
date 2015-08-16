@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-md-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-md-9">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#links" aria-controls="links" role="tab" data-toggle="tab">Links</a></li>
                    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                </ul>
                {!! Form::open(['url' => route('root-settings-social-save'), 'method' => 'post']) !!}
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="links">
                        <h2>Links</h2>
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

                    </div>
                    <div role="tabpanel" class="tab-pane" id="comments">
                        <h2>Comments</h2>
                        @include('root.partials.settings.comments-vk')
                        @include('root.partials.settings.comments-facebook')
                    </div>
                </div>

                <div class="text-right">
                    <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" value="SAVE" class="btn btn-success"/>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop