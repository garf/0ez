@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">New item</div>
            <div class="panel-body">
                <form action="{{ route('root-menu-save') }}" method="POST">
                    {!! csrf_field() !!}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="inputLinkType">Source</label>
                                    <select name="link_type" id="inputLinkType" class="form-control">
                                        <option value="url">URL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7" id="urlItem">
                                <div class="form-group">
                                    <label for="inputUrl">URL</label>
                                    <input type="text" name="url" id="inputUrl" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="inputSort">Order</label>
                            <input type="text" name="sort" id="inputSort" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="inputBlank">Taget Blank</label><br />
                            <input type="checkbox" name="on_blank" data-toggle="switch" id="inputBlank" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="inputBlank">Active Item </label>
                            <input type="text" name="active_item" class="form-control" id="inputActive" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="inputPosition">Position</label>
                            <select name="position" id="inputPosition" class="form-control">
                                <option value="top">Top</option>
                                <option value="bottom">Bottom</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <input type="submit" value="Add" class="btn btn-success btn-block">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <hr />
        <div>
            <div class="row hidden-sm hidden-sx">
                <div class="col-lg-3"><b>Title</b></div>
                <div class="col-lg-3"><b>URL</b></div>
                <div class="col-lg-1"><b>Blank</b></div>
                <div class="col-lg-2"><b>Pos</b></div>
                <div class="col-lg-3 text-right"><b>Options</b></div>
            </div>
            @foreach($items as $item)
                <div class="row">
                    <div class="col-lg-3">
                        {{ $item->title }}
                    </div>
                    <div class="col-lg-3">
                        {{ $item->url }}
                    </div>
                    <div class="col-lg-1">
                        <i class="fa {{ $item->on_blank ? 'fa-check-square' : 'fa-square' }}"></i>
                    </div>
                    <div class="col-lg-2">
                        {{ $item->position }}
                    </div>
                    <div class="col-lg-3 text-right">
                        @if($items->first() == $item)
                            <span class="btn btn-primary  disabled"><i class="fa fa-chevron-up"></i></span>
                        @else
                            <a href="{{  route('root-menu-up', ['menu_id' => $item->id]) }}" class="btn btn-primary">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        @endif

                        @if($items->last() == $item)
                                <span class="btn btn-primary  disabled"><i class="fa fa-chevron-down"></i></span>
                        @else
                            <a href="{{  route('root-menu-down', ['menu_id' => $item->id]) }}" class="btn btn-primary">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                        @endif
                        <a href="{{ route('root-menu-remove', ['menu_id' => $item->id]) }}"
                           onclick="return confirm('Are you sure?');"
                           class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@stop