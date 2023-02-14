@extends('front.layout.master')
@section('title', 'GossipGirl - About us')
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <?php
    $attribute = \Illuminate\Support\Facades\DB::table('background_images')->pluck('aboutus_bg');
//        dd($attribute[0])
    ?>
    <div class="breadcumb-area bg-img" style=" background:url(<?php echo'/'.$attribute[0]; ?>);">
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
                            <a href="#" class="post-tag"></a>
                            <h4><a href="#" class="post-headline">Welcome to Gossip Girl blog</a></h4>
                            <p class="mb-3">
                                Welcome to Gossip Girl USA! We are an anonymous, community-based gossip and information website. Our goal is to provide an online space for the who, what,
                                where in your neighborhood. Want the latest tea on everything happening in your own community?
                                Follow or apply to blog for your resident community. Gossip Girl USA is currently based in Orange County,
                                California and available to any residential community (apartments, condos or homes) in the United States.

                                Our bloggers are carefully selected once you apply and we ask that you post consistently (at least 3-4)
                                times per week,
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <div class="single-blog-content">
                            <p class="mb-3">but are encouraged to post as often as possible and keep up with the latest gossip for your community.
                                Posts can be specific to individuals or community based events, information or management.
                                Get creative and keep it light, positive and fun.

                                Those just here to follow or comment please keep it respectful and do not use individual names or information.

                                ***Please keep in mind Gossip Girl is strictly anonymous and prohibits the use of any names, descriptions,
                                addresses or personal information and pictures. Be respectful of other’s identities and privacy.
                                Anyone that violates these policies will no longer be allowed to blog or comment on Gossip Girl USA.
                            </p></div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                        <img src="{{asset('assets/img/blog-img/aboutus-image.jpeg')}}" alt="">
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
                            <a href="#" class="post-tag"></a>
                            <h4><a href="#" class="post-headline">Welcome to this Gossip Girl blog</a></h4>
                            <p>
                                ***Please keep in mind Gossip Girl is strictly anonymous and prohibits the use of any names, descriptions,
                                addresses or personal information and pictures. Be respectful of other’s identities and privacy.
                                Anyone that violates these policies will no longer be allowed to blog or comment on Gossip Girl USA.
                            </p></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">25</span></h2>
                        <p>Insta Followers</p>
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
                        <p>Linkedin Followers</p>
                    </div>
                </div>
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100">
                        <h2><span class="counter">16</span></h2>
                        <p>Twitter Followers</p>
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

                @foreach($randomPosts as $key => $posts)
{{--                    {{dd($key)}}--}}
                    <!-- Single Blog Area  -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-area blog-style-2 mb-100">
                            <div class="single-blog-thumbnail">
                                <a href="{{route('single.posts',[$posts->id])}}"><img src="{{asset($posts->post_image)}}" alt=""></a>
                                <div class="post-date">
                                   {{$posts->created_at->diffForHumans()}}
                                </div>
                            </div>
                            <!-- Blog Content -->
                            <div class="single-blog-content mt-50">
                                <div class="line"></div>
                                <a href="#" class="post-tag"></a>
                                <h4><a href="{{route('single.posts',[$posts->id])}}" class="post-headline">{{$posts->title}}</a></h4>
                                <p>
                                <p><?= \Illuminate\Support\Str::limit($posts->description, 300, $end='...') ?></p>
                                <div class="post-meta">
                                    <p>By <a href="#">{{$posts->username}}</a></p>
                                <?php
                                ?>
                                    <p>{{$comments[$key]}} comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->

@endsection
