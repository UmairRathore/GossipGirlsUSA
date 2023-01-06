
@php
   $latestposts = DB::table('posts')->orderby('id', 'desc')->take(4)->get();


@endphp
<!-- ##### Sidebar Area ##### -->
<div class="col-12 col-md-4 col-lg-3">
    <div class="post-sidebar-area">

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <form action="#" class="search-form">
                <input type="search" name="search" id="searchForm" placeholder="Search">
                <input type="submit" value="submit">
            </form>
        </div>

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title subscribe-title">Subscribe to my newsletter</h5>
            <div class="widget-content">
                <form action="#" class="newsletterForm">
                    <input type="email" name="email" id="subscribesForm" placeholder="Your e-mail here">
                    <button type="submit" class="btn original-btn">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Advertisement</h5>
            <a href="#"><img src="{{asset('assets/img/bg-img/add.gif')}}" alt=""></a>
        </div>

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Latest Posts</h5>

            @foreach($latestposts as $posts )
                <div class="widget-content">

                    <!-- Single Blog posts -->
                    <div class="single-blog-post d-flex align-items-center widget-post">
                        <!-- posts Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{asset($posts->post_image)}}" alt="">
                        </div>
                        <!-- posts Content -->
                        <div class="post-content">
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline">{{$posts->title}}</a></h4>
                            <div class="post-meta">
                                <p><a href="#">
                                        {{ date('d M', strtotime($posts->created_at))}}
                                    </a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{--                                <!-- Single Blog posts -->--}}
                    {{--                                <div class="single-blog-post d-flex align-items-center widget-post">--}}
                    {{--                                    <!-- posts Thumbnail -->--}}
                    {{--                                    <div class="post-thumbnail">--}}
                    {{--                                        <img src="{{asset('assets/img/blog-img/lp2.jpg')}}" alt="">--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- posts Content -->--}}
                    {{--                                    <div class="post-content">--}}
                    {{--                                        <a href="#" class="post-tag">Lifestyle</a>--}}
                    {{--                                        <h4><a href="#" class="post-headline">A sunday in the park</a></h4>--}}
                    {{--                                        <div class="post-meta">--}}
                    {{--                                            <p><a href="#">12 March</a></p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    {{--                                <!-- Single Blog posts -->--}}
                    {{--                                <div class="single-blog-post d-flex align-items-center widget-post">--}}
                    {{--                                    <!-- posts Thumbnail -->--}}
                    {{--                                    <div class="post-thumbnail">--}}
                    {{--                                        <img src="{{asset('assets/img/blog-img/lp3.jpg')}}" alt="">--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- posts Content -->--}}
                    {{--                                    <div class="post-content">--}}
                    {{--                                        <a href="#" class="post-tag">Lifestyle</a>--}}
                    {{--                                        <h4><a href="#" class="post-headline">Party people in the house</a></h4>--}}
                    {{--                                        <div class="post-meta">--}}
                    {{--                                            <p><a href="#">12 March</a></p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}

                    {{--                                <!-- Single Blog posts -->--}}
                    {{--                                <div class="single-blog-post d-flex align-items-center widget-post">--}}
                    {{--                                    <!-- posts Thumbnail -->--}}
                    {{--                                    <div class="post-thumbnail">--}}
                    {{--                                        <img src="{{asset('assets/img/blog-img/lp4.jpg')}}" alt="">--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- posts Content -->--}}
                    {{--                                    <div class="post-content">--}}
                    {{--                                        <a href="#" class="post-tag">Lifestyle</a>--}}
                    {{--                                        <h4><a href="#" class="post-headline">A sunday in the park</a></h4>--}}
                    {{--                                        <div class="post-meta">--}}
                    {{--                                            <p><a href="#">12 March</a></p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                </div>
        </div>
    </div>



</div>
</div>
