@foreach($messages as $message)
    <div class="alert alert-{{ $message['type'] == 'error' ? 'danger' : $message['type'] }} alert-dismissable" style="margin-bottom: 1px;">
        <button type="button" tabindex="-1" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! $message['message'] !!}
    </div>
@endforeach