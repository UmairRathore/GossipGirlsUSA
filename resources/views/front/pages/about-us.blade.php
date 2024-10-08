@extends('front.layout.master')
@section('title', 'GossipGirl - About us')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(assets/img/bg-img/aboutusbanner.jpeg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>about us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row align-items-end">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline">Welcome to Gossip Girl blog</a></h4>
                            <p class="mb-3">Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Morbi sodales, dolor id ultricies dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus.slacus sit amet augue sodales, vel cursus enim tristique.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus. Quisque molestie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum. Donec sagittis lacus sit amet augue sodales, vel cursus enim tristique. Maecenas vitae massa ut est consectetur sagittis quis vitae tortor.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{asset('assets/img/blog-img/reading-girl.jpg')}}" alt="">
{{--                        <!-- Catagory Title -->--}}
{{--                        <div class="catagory-title">--}}
{{--                            <a href="#">Lifestyle posts</a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <div class="cool-facts-area section-padding-100-0 bg-img background-overlay" style="background-image: url(assets/img/bg-img/b4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-blog-area blog-style-2 text-center mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="#" class="post-headline">Welcome to this Gossip Girl blog</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus. Quisque molestie convallis tempus. Ut semper purus metus, a euismod sapien sodales ac. Duis viverra eleifend fermentum. Donec sagittis lacus sit amet augue sodales, vel cursus enim tristique. Maecenas vitae massa ut est consectetur sagittis quis vitae tortor. Sed et massa vel.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">25</span></h2>
                        <p>Awards won</p>
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">12</span>K</h2>
                        <p>FB Followers</p>
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">9</span></h2>
                        <p>Team members</p>
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">16</span></h2>
                        <p>Coffes/Day</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->

    <div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row">
                @foreach($randomPosts as $posts)
                <!-- Single Blog Area  -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-area blog-style-2 mb-100">
                        <div class="single-blog-thumbnail">
                            <a href="{{route('single.posts',[$posts->id])}}" ><img src="{{$posts->post_image}}" alt=""></a>
                            <div class="post-date">
                                <a href="#">{{ date('d ', strtotime($posts->created_at))}}<span>
                                    {{ date(' M', strtotime($posts->created_at))}}</span></a>
                            </div>
                        </div>
                        <!-- Blog Content -->
                        <div class="single-blog-content mt-50">
                            <div class="line"></div>
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="{{route('single.posts',[$posts->id])}}" class="post-headline">{{$posts->title}}</a></h4>
                            <p>
{{--                                {{htmlspecialchars_decode($posts->description)}}--}}
                                <?= $posts->description ?></p>
                            <div class="post-meta">
                                <p>By <a href="#">{{$posts->username}}</a></p>
                                <p>3 comments</p>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <!-- Single Blog Area  -->--}}
{{--                <div class="col-12 col-md-6 col-lg-4">--}}
{{--                    <div class="single-blog-area blog-style-2 mb-100">--}}
{{--                        <div class="single-blog-thumbnail">--}}
{{--                            <img src="{{asset('assets/img/blog-img/5.jpg')}}" alt="">--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">10 <span>march</span></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Blog Content -->--}}
{{--                        <div class="single-blog-content mt-50">--}}
{{--                            <div class="line"></div>--}}
{{--                            <a href="#" class="post-tag">Lifestyle</a>--}}
{{--                            <h4><a href="#" class="post-headline">Party people in the house</a></h4>--}}
{{--                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>--}}
{{--                            <div class="post-meta">--}}
{{--                                <p>By <a href="#">james smith</a></p>--}}
{{--                                <p>3 comments</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Single Blog Area  -->--}}
{{--                <div class="col-12 col-md-6 col-lg-4">--}}
{{--                    <div class="single-blog-area blog-style-2 mb-100">--}}
{{--                        <div class="single-blog-thumbnail">--}}
{{--                            <img src="{{asset('assets/img/blog-img/6.jpg')}}" alt="">--}}
{{--                            <div class="post-date">--}}
{{--                                <a href="#">10 <span>march</span></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Blog Content -->--}}
{{--                        <div class="single-blog-content mt-50">--}}
{{--                            <div class="line"></div>--}}
{{--                            <a href="#" class="post-tag">Lifestyle</a>--}}
{{--                            <h4><a href="#" class="post-headline">We love colors in 2018</a></h4>--}}
{{--                            <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt.</p>--}}
{{--                            <div class="post-meta">--}}
{{--                                <p>By <a href="#">james smith</a></p>--}}
{{--                                <p>3 comments</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

@endsection
