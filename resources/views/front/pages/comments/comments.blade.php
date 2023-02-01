@foreach($comments as  $comment)

    <hr/>

    <div class="display-comment" @if($comment->parent_id != null)  style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->username}}</strong>
        <p>{{ date('d M H:i:s', strtotime($posts->created_at))}}</p>

        <p style="color: black">
            {{ $comment->body }}
        </p>

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

        @if(Session::has('replymessage'))

            <script>
                $('html, body').animate({

                    scrollTop: $("#commentreply").offset().top
                }, 2000);

            </script>

        @endif
        @include('front.pages.comments.comments', ['comments' => $comment->replies])


    </div>
@endforeach
