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

    <!-- Nav Area -->
    <div class="original-nav-area" id="stickyNav">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between">

                    <!-- Subscribe btn -->
                    <div class="subscribe-btn">
                        <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a>
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

                                {{--                                <li><a href="#">SignUp</a>--}}
                                {{--                                    <ul class="dropdown">--}}
                                {{--                                        <li><a href="#">Catagory 1</a>--}}
                                {{--                                            <ul class="dropdown">--}}
                                {{--                                                <li><a href="#">Catagory 2</a></li>--}}
                                {{--                                                <li><a href="#">Catagory 2</a></li>--}}
                                {{--                                                <li><a href="#">Catagory 2</a>--}}
                                {{--                                                    <ul class="dropdown">--}}
                                {{--                                                        <li><a href="#">Catagory 3</a></li>--}}
                                {{--                                                        <li><a href="#">Catagory 3</a></li>--}}
                                {{--                                                        <li><a href="#">Catagory 3</a></li>--}}
                                {{--                                                        <li><a href="#">Catagory 3</a></li>--}}
                                {{--                                                        <li><a href="#">Catagory 3</a></li>--}}
                                {{--                                                    </ul>--}}
                                {{--                                                </li>--}}
                                {{--                                                <li><a href="#">Catagory 2</a></li>--}}
                                {{--                                                <li><a href="#">Catagory 2</a></li>--}}
                                {{--                                            </ul>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li><a href="#">Catagory 1</a></li>--}}
                                {{--                                        <li><a href="#">Catagory 1</a></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </li>--}}
                                <li><a href="{{route('about-us')}}">About Us</a></li>
                                {{--                                <li><a href="#">Megamenu</a>--}}
                                {{--                                    <div class="megamenu">--}}
                                {{--                                        <ul class="single-mega cn-col-4">--}}
                                {{--                                            <li class="title">Headline 1</li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 1</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 2</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 3</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 4</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 5</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                        <ul class="single-mega cn-col-4">--}}
                                {{--                                            <li class="title">Headline 2</li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 1</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 2</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 3</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 4</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 5</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                        <ul class="single-mega cn-col-4">--}}
                                {{--                                            <li class="title">Headline 3</li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 1</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 2</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 3</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 4</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 5</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                        <ul class="single-mega cn-col-4">--}}
                                {{--                                            <li class="title">Headline 4</li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 1</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 2</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 3</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 4</a></li>--}}
                                {{--                                            <li><a href="#">Mega Menu Item 5</a></li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                <li><a href="{{route('contact-us')}}">Contact</a></li>
                                <li><a href="{{route('termsandpolicy')}}">terms</a></li>
                                @if(Auth::guard('user')->check())
                                    {{--                                @auth--}}

                                    <li>
                                        <a href="#">
                                            <div class="photo">
                                                <img src="{{asset('admin/assets/img/anime3.png')}}" alt="Profile Photo">
                                            </div>{{ Auth::user()->first_name }}</a>

                                        <ul class="dropdown">

                                            <li><a class="text-black font-20 tooltip-wrapper nav-item dropdown-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout" href="{{ route('logout') }}"
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
                                                </form></li>

                                        </ul>
                                    </li>
                                @else
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
                                <form action="#">
                                    <input type="text" id="search" placeholder="Search something...">
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
</header>
<!-- ##### Header Area End ##### -->
