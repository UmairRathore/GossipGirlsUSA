@extends('front.layout.master')
@section('title', 'GossipGirl - Blog')
@section('content')



    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            @foreach($randomsinglepost as $posts)
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(/assets/img/bg-img/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="#" data-animation="fadeInUp">lifestyle</a>
                                </div>
                                <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{route('single.posts',[$posts->id])}}">Take a look at last night’s party!</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <!-- Single Slide -->--}}
{{--            <div class="single-hero-slide bg-img" style="background-image: url(/assets/img/bg-img/b1.jpg);">--}}
{{--                <div class="container h-100">--}}
{{--                    <div class="row h-100 align-items-center">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="slide-content text-center">--}}
{{--                                <div class="post-tag">--}}
{{--                                    <a href="#" data-animation="fadeInUp">lifestyle</a>--}}
{{--                                </div>--}}
{{--                                <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{route('single.posts',,[$posts->id])}}">Take a look at last night’s party!</a></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Single Slide -->--}}
{{--            <div class="single-hero-slide bg-img" style="background-image: url(/assets/img/bg-img/b3.jpg);">--}}
{{--                <div class="container h-100">--}}
{{--                    <div class="row h-100 align-items-center">--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="slide-content text-center">--}}
{{--                                <div class="post-tag">--}}
{{--                                    <a href="#" data-animation="fadeInUp">lifestyle</a>--}}
{{--                                </div>--}}
{{--                                <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{route('single.posts')}}">Take a look at last night’s party!</a></h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            @endforeach
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
{{--                <div class="col-12 col-lg-4">--}}
{{--                    <div class="single-blog-area clearfix mb-100">--}}
{{--                        <!-- Blog Content -->--}}
{{--                        <div class="single-blog-content">--}}
{{--                            <div class="line"></div>--}}
{{--                            <a href="#" class="post-tag">Lifestyle</a>--}}
{{--                            <h4><a href="#" class="post-headline">Welcome to this Lifestyle blog</a></h4>--}}
{{--                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Morbi sodales, dolor id ultricies dictum</p>--}}
{{--                            <a href="#" class="btn original-btn">Read More</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @foreach($checkthispost as $posts)
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-area clearfix mb-100">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="#" class="post-tag">Lifestyle</a>
                                <h4><a href="#" class="post-headline">{{$posts->title}}</a></h4>
                                <p>{{$posts->description}}</p>
                                <a href="#" class="btn original-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{asset('assets/img/blog-img/1.jpg')}}" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">Lifestyle posts</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{asset('assets/img/blog-img/2.jpg')}}" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="#">latest posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

                    <!-- Single Blog Area  -->
                    <!-- Single Blog Area  -->
                    @foreach($randromposts as $posts)
                        <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="single-blog-thumbnail">
                                        <img src="{{$posts->post_image}}" alt="">
                                        <div class="post-date">
                                            <a href="#">12 <span>march</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Blog Content -->
                                    <div class="single-blog-content">
                                        <div class="line"></div>
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">{{$posts->title}}</a></h4>
                                        <p>{{$posts->description}}</p>
                                        <div class="post-meta">
                                            <p>By <a href="#">{{$posts->fname.''.$posts->lname}}</a></p>
                                            <p>3 comments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- Load More -->
                    <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                        <a href="#" class="btn original-btn">Read More</a>
                    </div>
                </div>

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
                                            <p><a href="#">{{$posts->created_at}}</a></p>
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
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->



@endsection
