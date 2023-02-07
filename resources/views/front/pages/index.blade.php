@extends('front.layout.master')
@section('title', 'GossipGirl - Blog')
@section('content')



    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
{{--            @if(isset($posts))--}}
            @foreach($randomslidesinglepost as $posts)
                <!-- Single Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url('{{ asset( $posts->post_image) }}');">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="slide-content text-center">

                                    <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{route('single.posts',[$posts->id])}}">{{$posts->title}}</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
{{--                @endif--}}
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">
                @foreach($checkthispost as $posts)
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-area clearfix mb-100">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <h4><a href="{{route('single.posts',[$posts->id])}}" class="post-headline">{{$posts->title}}</a></h4>
                                    <p><?= \Illuminate\Support\Str::limit($posts->description, 300, $end='...') ?></p>
                                <a href="{{route('single.posts',[$posts->id])}}" class="btn original-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-catagory-area clearfix mb-100">
                            <a href="{{route('single.posts',[$posts->id])}}" ><img src="{{$posts->post_image}}" alt=""></a>
                            <!-- Catagory Title -->
                            <div class="catagory-title">
                                <a href="{{route('single.posts',[$latest->id])}}">Lifestyle posts</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100">
                    @if(isset($latest))
                        <a href="{{route('single.posts',[$posts->id])}}" ><img src="{{$latest->post_image}}" alt=""></a>
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="{{route('single.posts',[$latest->id])}}">latest posts</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

                    @if(isset($randomposts))
                    <!-- Single Blog Area  -->
                    @foreach($randomposts as $posts)
                        <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="single-blog-thumbnail">
                                        <a href="{{route('single.posts',[$posts->id])}}" ><img src="{{$posts->post_image}}" alt=""></a>
                                        <div class="post-date">
                                            {{$posts->created_at->diffForHumans()}}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- Blog Content -->
                                    <div class="single-blog-content">
                                        <div class="line"></div>
                                        <h4><a href="{{route('single.posts',[$latest->id])}}" class="post-headline">{{$posts->title}}</a></h4>
                                        <p><?= \Illuminate\Support\Str::limit($posts->description, 500, $end='...') ?></p>
                                        <div class="post-meta">
                                            <p>By <a href="#">{{$posts->username}}</a></p>
                                            <p>{{$commentcount}} comments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @endif
                </div>

                @include('front.pages.sidebar')
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->



@endsection
