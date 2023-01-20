@foreach($comments as  $comment)

    <hr/>

    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ date('d M H:i:s', strtotime($posts->created_at))}}</p>
        {{--        {{dd($comment->User->first_name.''.$comment->User->last_name)}}--}}
        <p>{{$comment->User->first_name.''.$comment->User->last_name}}</p>
        <p style="color: black">
            {{ $comment->body }}
        </p>
        <a href="" id="reply"></a>

        <form id="ajaxreplyform">
            @csrf
            <div class="form-group">
{{--                <textarea class="form-control" id="body" name="body"></textarea>--}}
                <input type="hidden" id="post_id" name="post_id" value="{{ $post_id }}"/>
                <input type="hidden" id="parent_id" name="parent_id" value="{{ $comment->id }}"/>
            </div>
            <div class="form-group">
                <input id="save_reply" type="button" class="btn btn-primary" value="Reply"/>
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

<script type="text/javascript">

    // $(document).ready(function () {
    //     $("#replybutton").click(function (e) {
    //         $("#repliesdiv").toggleClass("d-none");
    //     });
    //     /*    // if( $('#repliesdiv').hasClass('d-none') ) {
    //         //     $("#replybutton").click(function(e){
    //         //         $("#repliesdiv").removeClass('d-none');
    //         //     });
    //         // }else
    //         // {
    //         //     $("#replybutton").click(function(e){
    //         //         $("#repliesdiv").addClass('d-none');
    //         //     });
    //         // }
    //         */
    // });

    {{--$.ajaxSetup({--}}
    {{--    headers: {--}}
    {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--    }--}}
    {{--});--}}

    {{--$("#ajaxreplyform").submit(function(e){--}}
    {{--    e.preventDefault();--}}
    {{--});--}}

    {{--// $('#save_reply').on('click', function (e) {--}}
    {{--$("#save_reply").click(function(e){--}}
    {{--    e.preventDefault();--}}
    {{--    var id = $('#this').data('id');--}}
    {{--    var body = $('#body').val();--}}
    {{--    var post_id = $('#post_id').val();--}}
    {{--    var parent_id = $('#parent_id').val();--}}
    {{--    $.ajax({--}}
    {{--        type: 'POST',--}}
    {{--        url: `{{ url('single-posts/') }}`,--}}
    {{--        // url:  "single-posts/",--}}
    {{--        //     url: "single-posts/" + id,--}}
    {{--        data: {--}}
    {{--            "_token": "{{ csrf_token() }}",--}}
    {{--            id: id,--}}
    {{--            body : body,--}}
    {{--            post_id : post_id,--}}
    {{--            parent_id : parent_id--}}
    {{--        },--}}
    {{--        success: function(data) {--}}
    {{--            // alert(data)--}}
    {{--            // jQuery('#city').html(data);--}}
    {{--        },--}}
    {{--        error: function (data) {--}}
    {{--            console.log('Error:', data);--}}
    {{--        }--}}
    {{--    });--}}
    {{--});--}}


    {{--$.ajax({--}}
    {{--    type: "POST",--}}
    {{--    url: "single/posts/" + id,--}}
    {{--    --}}{{--data: {--}}
    {{--    --}}{{--    "_token": "{{ csrf_token() }}",--}}
    {{--    --}}{{--    body: body,--}}
    {{--    --}}{{--    post_id: post_id,--}}
    {{--    --}}{{--    parent_id: parent_id,--}}
    {{--    --}}{{--},--}}
    {{--    data: $(this).serialize(),--}}
    {{--    dataType    : 'json',--}}

    {{--    success: function (result) {--}}
    {{--        if (result.status === true) {--}}

    {{--        } else {--}}

    {{--        }--}}
    {{--        // document.getElementById("msg").innerHTML = result;--}}
    {{--    },--}}
    {{--    error: function (result) {--}}
    {{--        alert('error');--}}
    {{--    }--}}

    // });




</script>
