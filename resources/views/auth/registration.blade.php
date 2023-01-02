@extends('auth.auth')
@section('title', 'User Sign Up')
@section('content')
{{--    <div class="bg">--}}
    <div class="container">
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
                <div class="card" style="margin-top: 10%;opacity: 0.8;box-shadow: 0 5px 30px black;">
                    <div class="card-header text-center" style="color: white">Sign Up as User</div>

                    <div class="card-body text-center">
                        <form method="POST" action="{{ route('userregisteration') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end" style="color: white">First Name</label>
                                <div class="col-md-6" >
                                    <input  id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end" style="color: white">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="color: white">Email Address</label>
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
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="color: white">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="color: white">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
                                    <button type="submit" class="btn btn-primary" >
                                        <strong style="color: white">Sign Up</strong>
                                    </button>
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    </div>--}}
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cross").click(function(){
                $(".alert-hide").hide();
            });
            setTimeout(function(){

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });


    </script>
@endsection
