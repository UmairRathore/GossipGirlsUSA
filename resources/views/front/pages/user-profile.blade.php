@extends('front.layout.master')
@section('title', 'GossipGirl - User Profile')
@section('content')

    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Contact Form Area -->
                <div class="col-12 col-md-10 col-lg-9">
                    <div class="contact-form">
{{--            <div class="card" >--}}
{{--                <div class="card-header">--}}
                    <h5 class="title">Edit Profile</h5>
                </div>
                @if(Session::has('message'))
                    <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                        <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {!! session('msg') !!}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('profile-update',[$user->id]) }}" enctype="multipart/form-data">
                        {{--                        {{dd($user->id)}}--}}
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="username" style="color: black">User Name</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{  $user->username ,old('username') }}" required autocomplete="username" autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="email" style="color: black"> Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ,old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <div class="form-group">
                                    <label for="password" style="color: black">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Your password will remain same, if left empty.</small><br><br>
                                </div>
                            </div>
{{--                            <div class="col-md-6 pr-md-1">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="password-confirm" style="color: black">Confirm Password</label>--}}
{{--                                    <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">

                                    <div>
                                        <label for="user_image" style="color: white">Add Image</label>
                                    </div>
                                    <div>

                                        @if($user->user_image)
                                            <img id="previewImg" src="{{ asset($user->user_image) }}" width="70px" height="70px"
                                                 class="img-thumbnail img-fluid blog-img" alt="Image">
                                        @else
                                            <img id="previewImg" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">
                                        @endif
                                        {{--                                                <img id="previewImg" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">--}}

                                    </div>
                                    <div>
                                        <button>
                                            <input type="file" name="user_image" onchange="previewFile(this);" class="img-thumbnail form-control @error('user_image') is-invalid @enderror">
                                            @error('user_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row mb-">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <strong style="color: white">Update</strong>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div></div></section>

<script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

<script type="text/javascript">


    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

</script>
@endsection
