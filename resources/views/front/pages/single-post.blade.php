@extends('front.layout.master')
@section('title', 'GossipGirl - Contact US')
@section('content')
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
                                <div class="post-date">
                                    <a href="#">12 <span>march</span></a>
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
                        @foreach($singlepost as $posts)
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline mb-0">{{$posts->title}}</a></h4>
                            <div class="post-meta mb-50">
                                <p>By <a href="#">{{$posts->username}}</a></p>
                                <p>3 comments</p>
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
                            <h4><a href="#" class="author-name">{{$posts->username}}</a></h4>
                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero.</p>
                        </div>
                    </div>

                    <!-- Comment Area Start -->
                    <div class="comment_area clearfix mt-70">
                        <h5 class="title">Comments</h5>

                        <hr />
                        @if(auth()->check())
                        <h4>Add comment</h4>
                        <form id="commentform" method="post" action="{{ route('comments_store',[$posts->id]) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" id="submit" class="btn btn-primary" value="Add Comment" />
                            </div>
                        </form>
                        @include('front.pages.comments.comments', ['comments' => $posts->comments, 'post_id' => $posts->id])

                        @else
                            <h4>Please <a href="{{route('login')}}"> <h4>Login</h4></a> to comment</h4>
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
            </div>
        </div>
    </div>

    <!-- ##### Single Blog Area End ##### -->
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $("#submit").click(function (e) {--}}
{{--            // $("#repliesdiv").toggleClass("d-none");--}}
{{--            $('html, body').animate({--}}
{{--                scrollTop: ($('#divdown').offset().top )--}}
{{--            }, 200);--}}

{{--        });--}}
{{--        --}}
{{--    // $(document).ready(function() {--}}
{{--    //     $('#button[type="submit"]').click()--}}
{{--    //     {--}}
{{--    //         var div = $('div#results')--}}
{{--    //         var o = div.offset().top; //gets the top position of the div--}}
{{--    //         var h = div.outerHeight(); // gets the height of the div--}}
{{--    //--}}
{{--    //         div.scrollTop( o + h ); //scrolls page to the bottom of the div--}}
{{--    //--}}
{{--    //     }});--}}
{{--</script>--}}
@endsection
