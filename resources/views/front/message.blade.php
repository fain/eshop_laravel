@foreach (['danger', 'warning', 'success', 'info'] as $message)
    @if(Session::has($message))
        <div class="alert alert-{{ $message }}">
            {!! session($message) !!}
            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
        </div>
    @endif
@endforeach