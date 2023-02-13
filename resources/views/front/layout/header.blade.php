<style>
    .photo {
        display: inline-block;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        vertical-align: middle;
        overflow: hidden;
    }
    @media only screen and (max-width: 600px) {
        .logotitle {
            font-size: 25px;
            /*width: 100px;*/
        }
    }
    @media only screen and (min-width: 601px) {
        .logotitle {
            font-size: 50px;
            /*width: 100px;*/
        }
    }

    .logotitle{
        color: black;  font-family: fantasy ;font-weight: bolder;
    }

    /*@font-face {*/
    /*    font-family: Logofont;*/
    /*    src: url(public/amaz);*/
    /*}*/

    /*.logoimage {*/
    /*    font-family: cursive;*/
    /*}*/

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

                    <div class="subscribe-btn">

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
                                <li><a href="#">Search with Zipcode</a>

                                <ul class="dropdown" style="background-color: #f2f4f8">
                                    <form action="{{route('search.zipcode')}}" method="get">
                                        @csrf
                                        <input type="search" name="search" id="search" placeholder="Search Posts...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </ul>
                                </li>
                            </ul>

                            <!-- Search Form  -->
                            <div id="search-wrapper">
                                    <form action="{{route('search')}}" method="get">
                                        @csrf
                                        <input type="search" name="search" id="search" placeholder="Search Posts...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>

                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Logo Area -->
    <div class="logo-area text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <a class="logotitle" href="{{route('index')}}" style="color: black;text-decoration: none;"><h1 class="logotitle"> GOSSIP GIRL USA</h1></a>
                    {{--                    <a href="{{route('index')}}" class="original-logo"><img src="{{asset('assets/img/core-img/logo.png')}}" alt=""></a>--}}
                </div>
            </div>
        </div>
    </div>


</header>
<!-- ##### Header Area End ##### -->
