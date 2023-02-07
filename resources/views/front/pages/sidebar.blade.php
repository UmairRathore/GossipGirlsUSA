
@php

if(auth()->check())
    {
    $me = '206.217.224.86';  //get IP
            $ip = Stevebauman\Location\Facades\Location::get($me); //get zipcode from location
            $zipcode = $ip->zipCode;  //save zipcode
       $latestposts = DB::table('posts')->where('posts.zipcode','=',$zipcode)
                ->orderby('id', 'desc')->take(4)->get();
       $randomPostAd = DB::table('posts')->where('posts.zipcode','=',$zipcode)
                ->inRandomOrder()->take(3)->get();
    }
else{

  $latestposts = DB::table('posts') ->orderby('id', 'desc')->take(4)->get();
  $randomPostAd = DB::table('posts')->inRandomOrder()->take(3)->get();

}




@endphp
<!-- ##### Sidebar Area ##### -->
<div class="col-12 col-md-4 col-lg-3">
    <div class="post-sidebar-area">

        <!-- Widget Area -->
        <div class="sidebar-widget-area">
            <h5 class="title">Latest Posts</h5>

            @foreach($latestposts as $posts )
                <div class="widget-content">

                    <!-- Single Blog posts -->
                    <div class="single-blog-post d-flex align-items-center widget-post">
                        <!-- posts Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="{{route('single.posts',[$posts->id])}}" ><img src="{{asset($posts->post_image)}}" alt=""></a>
                        </div>
                        <!-- posts Content -->
                        <div class="post-content">
                            <a href="#" class="post-tag">Lifestyle</a>
                            <h4><a href="{{route('single.posts',[$posts->id])}}" class="post-headline">{{$posts->title}}</a></h4>
                            <div class="post-meta">
                                <p><a href="#">
                                        {{ date('d M', strtotime($posts->created_at))}}

                                    </a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>



</div>

