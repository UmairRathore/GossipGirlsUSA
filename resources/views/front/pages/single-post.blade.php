@extends('front.layout.master')
@section('title', 'GossipGirl - Blog Post')
@section('content')

    <style>

        .col-md-2, .col-md-10{
            padding:0;
        }
        .panel{
            margin-bottom: 0px;
        }
        .chat-window{
            bottom:0;
            position:fixed;
            float:right;
            margin-left:10px;
        }
        .chat-window > div > .panel{
            border-radius: 5px 5px 0 0;
        }
        .icon_minim{
            padding:2px 10px;
        }
        .msg_container_base{
            background: #e5e5e5;
            margin: 0;
            padding: 100px 10px 10px;
            max-height:300px;
            overflow-x:hidden;
        }
        .top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }
        .msg_receive{
            padding-left:0;
            margin-left:0;
        }
        .msg_sent{
            padding-bottom:20px !important;
            margin-right:0;
        }
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width:100%;
        }
        .messages > p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
        }
        .messages > time {
            font-size: 11px;
            color: #ccc;
        }
        .msg_container {
            padding: 10px 10px 10px 10px ;
            overflow: hidden;
            display: flex;
        }
        img {
            display: block;
            width: 100%;
        }
        .avatar {
            position: relative;
        }
        .base_receive > .avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }

        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
        }
        .base_sent > .avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
        }

        .msg_sent > time{
            float: right;
        }



        .msg_container_base::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar
        {
            width: 12px;
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar-thumb
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }

        .btn-group.dropup{
            position:fixed;
            left:0px;
            bottom:0;
        }
    </style>
    <!-- ##### Single Blog Area Start ##### -->
    <div class="single-blog-wrapper section-padding-0-100">

        <!-- Single Blog Area  -->
        <div class="single-blog-area blog-style-2 mb-50">
            <div class="single-blog-thumbnail">
                <img src="img/bg-img/b5.jpg" alt="">
                <div class="post-tag-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @foreach($singlepost as $key => $posts)
                                    <div class="post-date">
                                        <a href="#">
                                           <span> {{ date('d M', strtotime($posts->created_at))}}
</span>
                                        </a>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- ##### posts Content Area ##### -->
                <div class="col-12 col-lg-9">
                    <!-- Single Blog Area  -->
                    <div class="single-blog-area blog-style-2 mb-50">
                        <!-- Blog Content -->
                        {{--                        {{dd($singlepost)}}--}}

                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag"></a>
                            <h4><a href="#" class="post-headline mb-0">{{$posts->title}}</a></h4>
                            <div class="post-meta mb-50">
                                <p>By <a href="{{route('blogger.posts',[$posts->user_id])}}">{{$posts->username}}</a></p>
                                <p>{{$comments[$key]}} comments</p>
                            </div>
                            <p><?= $posts->description ?></p>

                            {{--                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum --}}
                            {{--                                convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. --}}
                            {{--                                Morbi sodales, dolor id ultricies dictum, diam odio tempor purus, at ultrices elit nulla ac nisl.--}}
                            {{--                                Vestibulum enim sapien, blandit finibus elit vitae, venenatis tempor enim. Ut varius eros at fringilla aliquet. --}}
                            {{--                                Sed sed sodales quam. Nam fermentum sed turpis sollicitudin lobortis.</p>--}}

                            {{--                            <p>Proin a nibh dignissim, volutpat mauris vitae, pellentesque nisi. In euismod non ligula at gravida. --}}
                            {{--                                Nunc blandit eget enim vel mattis. Sed semper, purus ac suscipit scelerisque, eros dui fermentum tortor,--}}
                            {{--                                vitae facilisis lacus nulla sit amet diam. Nullam eget sagittis mi. Suspendisse vitae volutpat lorem. --}}
                            {{--                                Cras porta velit id sagittis ultrices. Maecenas efficitur tellus ac aliquam molestie. Morbi vel ipsum gravida,--}}
                            {{--                                ultricies nunc sed, posuere purus. Donec ipsum lectus, congue ut fermentum vitae, molestie hendrerit erat. --}}
                            {{--                                Sed lacinia accumsan egestas. Cras ac ipsum a ante placerat pellentesque.</p>--}}
                        </div>

                    </div>

                    <!-- About Author -->
                    <div class="blog-post-author mt-100 d-flex">
                        <div class="author-thumbnail">
                            <img src="img/bg-img/b6.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <div class="line"></div>
                            <span class="author-role">Author</span>
                            <h4><a href="{{route('blogger.posts',[$posts->user_id])}}" class="author-name">{{$posts->username}}</a>
                                <input id="author-id" type="hidden" value="{{$posts->user_id}}">
                                @if(auth()->check())
                                <button id="chatmodalbutton" class="btn btn-primary"> message author</button>
                                    @endif
                            </h4>
                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero.</p>
                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <h5 class="title">Comments</h5>

                        <hr/>
                        @if(auth()->check())
                            <h4>Add comment</h4>
                            <form id="commentform" method="post" action="{{ route('comments_store',[$posts->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="submit" class="btn btn-primary" value="Add Comment"/>
                                </div>
                            </form>
                            @include('front.pages.comments.comments', ['comments' => $posts->comments, 'post_id' => $posts->id])

                        @else
                            <h4>Please <a href="{{route('login')}}"><h4>Login</h4></a> to comment</h4>
                        @endif

                        {{--                        <div id="divdown"></div>--}}
                        @endforeach
                        @if(Session::has('message'))
                            <div id="divdown">
                            </div>
                            <script>

                                $('html, body').animate({
                                    scrollTop: $("#divdown").offset().top
                                }, 2000);

                            </script>

                        @endif
                    </div>
                </div>

                @include('front.pages.sidebar')
                @if(auth()->check())
                <div id="classmodaldiv" class="d-none">
{{--                    @include('front.pages.chat.chat-modal')--}}

                    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
                        <div class="col-xs-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading top-bar">
                                    <h5 class="panel-title">
                                        {{$posts->username}}
                                    </h5>
                                </div>
                                <div class="panel-body msg_container_base">
                                    <div class="row msg_container base_sent">
                                        <div class="col-md-10 col-xs-10">
                                            <div class="messages msg_sent">
                                                <p>that mongodb thing looks good, huh?
                                                    tiny master db, and huge document store</p>
                                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <form id="chatmodalform" action="{{route('store.chat')}}" method="post" >
                                        @csrf
                                        <input name="receiver_id" type="hidden" value="{{$posts->user_id}}">
                                        <input name="sender_id" type="hidden" value="{{Auth::user()->id}}">
                                    <div class="input-group">
                                        <input id="btn-input" type="text" class="form-control input-sm chat_input @error('messsage') is-invalid @enderror" value="{{ old('message') }}" name="message" placeholder="Write your message here..." />
{{--                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>--}}
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="input-group-btn">
{{--                                            <button type="submit" class="btn btn-primary">--}}
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
                        </ul>
                    </div>
                </div>
                    @endif

            </div>

        </div>
    </div>



    <script>
        $(document).ready(function () {
            $("#chatmodalbutton").click(function (e) {
                $("#classmodaldiv").toggleClass('d-none');
                // alert($(this).val("#author-id"));
            });
        });

        $(document).on('click', '.panel-heading span.icon_minim', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
        });
        $(document).on('focus', '.panel-footer input.chat_input', function (e) {
            var $this = $(this);
            if ($('#minim_chat_window').hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideDown();
                $('#minim_chat_window').removeClass('panel-collapsed');
                $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
            }
        });
        $(document).on('click', '#new_chat', function (e) {
            var size = $( ".chat-window:last-child" ).css("margin-left");
            size_total = parseInt(size) + 400;
            alert(size_total);
            var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
            clone.css("margin-left", size_total);
        });
        $(document).on('click', '.icon_close', function (e) {
            //$(this).parent().parent().parent().parent().remove();
            $( "#chat_window_1" ).remove();
        });


    </script>



@endsection



<!------ Include the above in your HEAD tag ---------->







