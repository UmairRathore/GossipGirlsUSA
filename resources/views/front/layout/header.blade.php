<style>
    .photo {
        display: inline-block;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        vertical-align: middle;
        overflow: hidden;
    }
</style>

<body>
{{--<!-- Preloader -->--}}
{{--<div id="preloader">--}}
{{--    <div class="preload-content">--}}
{{--        <div id="original-load"></div>--}}
{{--    </div>--}}
{{--</div>--}}


<!-- Subscribe Modal -->


<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Nav Area -->
    <div class="original-nav-area" id="stickyNav">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between">

                    {{--                    <!-- Subscribe btn -->--}}
                    <div class="subscribe-btn">
                        {{--                        <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a>--}}
                    </div>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu" id="originalNav">
                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('about.us')}}">About Us</a></li>
                                <li><a href="{{route('contact.us')}}">Contact</a></li>
                                <li><a href="{{route('termsandpolicy')}}">terms</a></li>
                                @if(Auth::guard('user')->check())
                                    {{--                                @auth--}}

                                    <li><a href="#">
                                            <div class="photo">
                                                <img src="{{asset('admin/assets/img/anime3.png')}}" alt="Profile Photo">
                                            </div>{{ Auth::user()->username }}</a>

                                        <ul class="dropdown">
                                            @if( Auth::user()->role_id===2)
                                                <li>
                                                    <a href="{{route('user.profile.edit',[Auth::user()->id])}}">Profile</a>
                                                </li>
                                            @endif
                                            <li><a class="text-black font-20 tooltip-wrapper nav-item dropdown-item"
                                                   data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"
                                                   href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> <i
                                                        class="zmdi zmdi-power"></i>
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                    {{--                                <button type="submit" class="btn btn-primary" >--}}
                                                    {{--                                    logout--}}
                                                    {{--                                </button>--}}
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                @else
                                    <li>

                                    <li><a href="{{route('login')}}">Sign In</a>
                                    </li>
                                    {{--                                    @guest--}}
                                    <li><a href="#">SignUp</a>

                                        <ul class="dropdown">
                                            <div class="megamenu">
                                                <li><a href="{{route('user-register')}}">SignUp as User </a></li>
                                                <li><a href="{{route('blogger-register')}}">SignUp as Blogger</a></li>
                                            </div>
                                        </ul>
                                    </li>
                                    {{--                                @endguest--}}
                                @endif
                            </ul>

                            <!-- Search Form  -->
                            <div id="search-wrapper">
{{--                                <form action="{{route('search')}}" method="get">--}}
{{--                                    @csrf--}}
{{--                                    <li class="search-bar input-group">--}}
{{--                                        <input type="search" class="form-control" name="search" placeholder="Search users"> <span class="input-group-btn"></span>--}}
{{--                                        <button type="submit" class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal">--}}
{{--                                            <i class="tim-icons icon-zoom-split"></i>--}}
{{--                                            <span class="d-lg-none d-md-block">{{ __('Search') }}</span>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
                                    <form action="{{route('search')}}" method="get">
                                        @csrf
                                        <input type="search" name="search" id="search" placeholder="Search Posts...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
{{--                                    <form action="#">--}}
{{--                                        <input type="text" id="search" placeholder="Search something...">--}}
{{--                                        <div id="close-icon"></div>--}}
{{--                                        <input class="d-none" type="submit" value="">--}}
{{--                                    </form>--}}
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Top Header Area -->
    {{--    <div class="top-header">--}}
    {{--        <div class="container h-100">--}}
    {{--            <div class="row h-100 align-items-center">--}}
    {{--                <!-- Breaking News Area -->--}}
    {{--                <div class="col-12 col-sm-8">--}}
    {{--                    <div class="breaking-news-area">--}}
    {{--                        <div id="breakingNewsTicker" class="ticker">--}}
    {{--                            <ul>--}}
    {{--                                <li><a href="#">Hello World!</a></li>--}}
    {{--                                <li><a href="#">Hello Universe!</a></li>--}}
    {{--                                <li><a href="#">Hello Original!</a></li>--}}
    {{--                                <li><a href="#">Hello Earth!</a></li>--}}
    {{--                                <li><a href="#">Hello Colorlib!</a></li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <!-- Top Social Area -->--}}
    {{--                <div class="col-12 col-sm-4">--}}
    {{--                    <div class="top-social-area">--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>--}}
    {{--                        @if(Auth::guard('user')->check())--}}
    {{--                        <a href="#" data-toggle="tooltip" data-placement="bottom"><img class="photo " src="{{asset('admin/assets/img/anime3.png')}}" alt="Profile Photo">--}}
    {{--                            {{ Auth::user()->username }}--}}

    {{--                            <ul class="dropdown">--}}

    {{--                                <li><a class="text-black font-20 tooltip-wrapper nav-item dropdown-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout" href="{{ route('logout') }}"--}}
    {{--                                       onclick="event.preventDefault();--}}
    {{--                                        document.getElementById('logout-form').submit();"> <i--}}
    {{--                                            class="zmdi zmdi-power"></i>--}}
    {{--                                        Logout--}}
    {{--                                    </a>--}}
    {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
    {{--                                        @csrf--}}
    {{--                                    </form></li>--}}

    {{--                            </ul>--}}
    {{--                        </a>--}}
    {{--                            @else--}}
    {{--                                <a href="#" data-toggle="tooltip" data-placement="bottom">SignUp</a>--}}
    {{--                                    <li><a href="#">SignUp</a>--}}
    {{--                                                                <ul class="dropdown-menu">--}}
    {{--                 --}}
    {{--                                            <li><a href="{{route('user-register')}}">SignUp as User </a></li>--}}
    {{--                                            <li><a href="{{route('blogger-register')}}">SignUp as Blogger</a></li>--}}
    {{--                                        </div>--}}
    {{--                                    </ul>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Logo Area -->
    <div class="logo-area text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <a href="{{route('index')}}" class="original-logo"><img src="{{asset('assets/img/core-img/logo.jpeg')}}" alt=""></a>
                    {{--                    <a href="{{route('index')}}" class="original-logo"><img src="{{asset('assets/img/core-img/logo.png')}}" alt=""></a>--}}
                </div>
            </div>
        </div>
    </div>


</header>
<!-- ##### Header Area End ##### -->
