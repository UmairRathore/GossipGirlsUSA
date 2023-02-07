<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif >
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

{{--            @if(auth()->user()->role_id===3)--}}
            <li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile-edit',[auth()->user()->id])  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Profile') }}</p>
                </a>
            </li>

            </li>
{{--            @endif--}}

            @if(auth()->user()->role_id===1)
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Roles') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users-list') class="active " @endif>
                            <a href="{{ route('users-list') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Users') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'bloggers-list') class="active " @endif >
                            <a href="{{ route('bloggers-list') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Bloggers') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'contact-list') class="active " @endif >
                            <a href="{{ route('contact-list') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('ContactForm') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'background-list') class="active " @endif>
                            <a href="{{ route('bg.show')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Background Image') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'bloggersposts-list') class="active " @endif>
                            <a href="{{ route('bloggersposts.show') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('Posts') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
@endif

            @if(auth()->user()->role_id===3)

                <li @if ($pageSlug == 'posts-list') class="active " @endif>
                    <a href="{{ route('posts.show')  }}">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ __('Create Post') }}</p>
                    </a>
                </li>


    @endif
{{--                    <ul class="nav pl-4">--}}
                        {{--                        <li @if ($pageSlug == 'profile') class="active " @endif>--}}
                        {{--                            <a href="{{ route('profile-edit',[auth()->user()->id])  }}">--}}
                        {{--                                <i class="tim-icons icon-single-02"></i>--}}
                        {{--                                <p>{{ __('User Profile') }}</p>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
{{--                        <li @if ($pageSlug == 'posts') class="active " @endif>--}}
{{--                            <a href="{{ route('posts.create')  }}">--}}
{{--                                <i class="tim-icons icon-bullet-list-67"></i>--}}
{{--                                <p>{{ __('Create Post') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul> --}}




            {{--            <li @if ($pageSlug == 'icons') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.icons') }}">--}}
            {{--                    <i class="tim-icons icon-atom"></i>--}}
            {{--                    <p>{{ __('Icons') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li @if ($pageSlug == 'maps') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.maps') }}">--}}
            {{--                    <i class="tim-icons icon-pin"></i>--}}
            {{--                    <p>{{ __('Maps') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li @if ($pageSlug == 'notifications') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.notifications') }}">--}}
            {{--                    <i class="tim-icons icon-bell-55"></i>--}}
            {{--                    <p>{{ __('Notifications') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li @if ($pageSlug == 'tables') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.tables') }}">--}}
            {{--                    <i class="tim-icons icon-puzzle-10"></i>--}}
            {{--                    <p>{{ __('Table List') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li @if ($pageSlug == 'typography') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.typography') }}">--}}
            {{--                    <i class="tim-icons icon-align-center"></i>--}}
            {{--                    <p>{{ __('Typography') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li @if ($pageSlug == 'rtl') class="active " @endif>--}}
            {{--                <a href="{{ route('pages.rtl') }}">--}}
            {{--                    <i class="tim-icons icon-world"></i>--}}
            {{--                    <p>{{ __('RTL Support') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">--}}
            {{--                <a href="{{ route('pages.upgrade') }}">--}}
            {{--                    <i class="tim-icons icon-spaceship"></i>--}}
            {{--                    <p>{{ __('Upgrade to PRO') }}</p>--}}
            {{--                </a>--}}
            {{--            </li>--}}
{{--        </ul>--}}
    </div>
</div>
