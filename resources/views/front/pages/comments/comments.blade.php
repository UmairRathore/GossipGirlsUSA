@foreach($comments as  $comment)

    <hr/>

    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ date('d M H:i:s', strtotime($posts->created_at))}}</p>
        <p style="color: black">
            {{ $comment->body }}
        </p>
        <a href="" id="reply"></a>

        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control"/>
                <input type="hidden" name="post_id" value="{{ $post_id }}"/>
                <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reply"/>
            </div>
        </form>
{{--        <button id="replybutton"> replies</button>--}}

{{--        {{dd($comment->parent_id)}}--}}

{{--        <div id="repliesdiv{{$comment->parent_id}}" class="d-none">--}}

            @include('front.pages.comments.comments', ['comments' => $comment->replies])
{{--        </div>--}}

    </div>

@endforeach
{{--{{dd($comment->parent_id)}}--}}

    <script src="{{asset('assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#replybutton").click(function (e) {
                $("#repliesdiv").toggleClass("d-none");
            });
            /*    // if( $('#repliesdiv').hasClass('d-none') ) {
                //     $("#replybutton").click(function(e){
                //         $("#repliesdiv").removeClass('d-none');
                //     });
                // }else
                // {
                //     $("#replybutton").click(function(e){
                //         $("#repliesdiv").addClass('d-none');
                //     });
                // }
                */
        });
    </script>
