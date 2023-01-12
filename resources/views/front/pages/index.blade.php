@extends('front.layout.master')
@section('title', 'GossipGirl - Blog')
@section('content')



    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            @foreach($randomsinglepost as $posts)
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url('{{ asset( $posts->post_image) }}');">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="slide-content text-center">
                                <div class="post-tag">
                                    <a href="#" data-animation="fadeInUp">lifestyle</a>
                                </div>
                                <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{route('single.posts',[$posts->id])}}">{{$posts->title}}</a></h2>
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
                                <p><?= $posts->description ?></p>
                                <a href="{{route('single.posts',[$posts->id])}}" class="btn original-btn">Read More</a>
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
                        <img src="{{$latest->post_image}}" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="{{route('single.posts',[$latest->id])}}">latest posts</a>
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
                    @foreach($randomposts as $posts)
                        <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="single-blog-thumbnail">
                                        <img src="{{$posts->post_image}}" alt="">
                                        <div class="post-date">
                                            <a href="#">{{ $posts->created_at->format('d') }}<span>{{ $posts->created_at->format('M') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Blog Content -->
                                    <div class="single-blog-content">
                                        <div class="line"></div>
                                        <a href="#" class="post-tag">Lifestyle</a>
                                        <h4><a href="#" class="post-headline">{{$posts->title}}</a></h4>
                                        <p><?= $posts->description ?></p>
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

                @include('front.pages.sidebar')
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->



@endsection
