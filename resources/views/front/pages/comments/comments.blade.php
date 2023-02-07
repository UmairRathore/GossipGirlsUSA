@foreach($comments as  $comment)

    <hr/>

    <div class="display-comment" @if($comment->parent_id != null)  style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->username}}</strong>
        <p>{{ date('d M H:i:s', strtotime($posts->created_at))}}</p>
{{--        {{dd($comment->User->first_name.''.$comment->User->last_name)}}--}}
{{--        <p>{{$comment->user->username}}</p>--}}
        <p style="color: black">
            {{ $comment->body }}
        </p>
        <?php
//        $random =rand(10,10000);
//        dd($comment->id)
        ?>
        <a href="" id="reply"></a>

        <form method="post" action="{{ route('comments_store',[$comment->post_id]) }}">
            @csrf
            <div class="form-group">
                <input type="text" id="body" name="body" class="form-control"/>
                <input type="hidden" id="post_id" name="post_id" value="{{ $post_id }}"/>
                <input type="hidden" id="parent_id" name="parent_id" value="{{ $comment->id }}"/>
            </div>
            <div class="form-group">
                <input id="save-reply" type="submit" class="btn btn-primary" value="Reply"/>
            </div>
        </form>
{{--        <button id="replybutton"> replies</button>--}}

{{--        {{dd($comment->parent_id)}}--}}

{{--        <div id="repliesdiv{{$comment->parent_id}}" class="d-none">--}}
@if(Session::has('replymessage'))
{{--        {{dd($replyid)}};--}}
{{--    <div id="replymessage{{$comment->id}}">--}}
{{--    </div>--}}
    <script>
        $('html, body').animate({

            scrollTop: $("#commentreply").offset().top
        }, 2000);

    </script>

@endif
            @include('front.pages.comments.comments', ['comments' => $comment->replies])
{{--        </div>--}}

    </div>
@endforeach
{{--{{dd($comment->parent_id)}}--}}

    <script src="{{asset('assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script type="text/javascript">

        $(document).ready(function () {
            $("#replybutton").click(function (e) {
                // $("#repliesdiv").toggleClass("d-none");
                $('html, body').animate({
                    scrollTop: ($('#what').offset().top )
                }, 200);

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




        {{--$.ajaxSetup({--}}
        {{--    headers: {--}}
        {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--    }--}}
        {{--});--}}

        {{--$(document).ready(function () {--}}
        {{--    $('#save-comment').on('submit', function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $('#this').data('id');--}}
        {{--        var body = $('#body').val();--}}
        {{--        var post_id = $('#post_id').val();--}}
        {{--        var parent_id = $('#parent_id').val();--}}

        {{--        e.preventDefault();--}}
        {{--        $.ajax({--}}
        {{--            type: "POST",--}}
        {{--            url: "single/posts/" + id,--}}
        {{--            --}}{{--data: {--}}
        {{--            --}}{{--    "_token": "{{ csrf_token() }}",--}}
        {{--            --}}{{--    body: body,--}}
        {{--            --}}{{--    post_id: post_id,--}}
        {{--            --}}{{--    parent_id: parent_id,--}}
        {{--            --}}{{--},--}}
        {{--            data: $(this).serialize(),--}}
        {{--            dataType    : 'json',--}}

        {{--            success: function (result) {--}}
        {{--                if (result.status === true) {--}}

        {{--                } else {--}}

        {{--                }--}}
        {{--                // document.getElementById("msg").innerHTML = result;--}}
        {{--            },--}}
        {{--            error: function (result) {--}}
        {{--                alert('error');--}}
        {{--            }--}}

        {{--        });--}}
        {{--    });--}}
        {{--});--}}



    </script>
