@extends('front.layout.master')
@section('subject', 'GossipGirl - Search ')
@section('content')
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row align-items-end">



@foreach($search as $post)

    <a href="{{route('single.posts',[$post->id])}}"> <h4 style="color: black">{{$post->title}}</h4></a>

    <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
            <a href="{{route('single.posts',[$post->id])}}"> <img src="{{asset($posts->post_image)}}" alt=""></a>
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">

            <p>
                <?= $post->description ?>
            </p>
        </div>
    </div>

@endforeach
            </div>
        </div>
    </div>
@endsection
