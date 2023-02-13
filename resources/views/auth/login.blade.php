@extends('auth.auth')
@section('title', 'Login')
@section('content')
    {{--<div class="bg">--}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert-hide" style="margin-top: 10px" >
                @if(Session::has('message'))
                    <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                        <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {!! session('msg') !!}
                    </div>
                @endif

            </div>
            <div class="card" style="margin-top: 10%;opacity: 0.8;">
                <div class="card-header text-center" style="color: white">Login</div>
                <div class="card-body text-center ">
                    <form method="POST" action="{{ route('postlogin') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-5 col-form-label text-md-end" style="color: white">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-5 col-form-label text-md-end" style="color: white">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>


                        {{--<div class="row mb-0">--}}
                        {{--    <div class="col-md-6 offset-md-4">--}}
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                        {{--    </div>--}}
                        {{--</div>--}}
                    </form>
                        <div class="row mb-3">
                            <div class="col-md-12">
                        <a href="{{ route('forget.password') }}">Reset Password</a>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{--</div>--}}

    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script>
        // <!--alert Hide and Time Duration -->
        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });
        // <!--alert Hide and Time Duration -->
    </script>

@endsection
