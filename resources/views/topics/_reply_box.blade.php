@include('shared._error')

<div class="reply-box">
    <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <div class="form-group">
            <textarea class="form-control inputor" rows="3" placeholder="分享你的见解~" name="content1"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 回复</button>
    </form>
</div>
<hr>

@section('styles')
    <link href="{{asset('css/jquery.atwho.min.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{asset('js/jquery.atwho.min.js')}}"></script>
    <script src="{{asset('js/jquery.caret.min.js')}}"></script>
    <script>
        $('.inputor').atwho({
            at: "@",
            callbacks: {
                remoteFilter: function(query, callback) {
                    $.getJSON("/topics/{{ $topic->id }}/repliers", {q: query}, function(data) {
                        callback(data)
                    });
                }
            }
        })
    </script>
@endsection
