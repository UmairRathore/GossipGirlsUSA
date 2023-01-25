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
                                <label for="username" class="col-md-4 col-form-label text-md-end" style="color: white">User Name</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
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
                                <label for="zipcode" class="col-md-4 col-form-label text-md-end" style="color: white">Zipcode</label>
                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="zipcode">
                                    @error('zipcode')
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

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="color: white">
                                        1)
                                        <input type="checkbox" required name="terms-condition" value="check" id="agree" />
                                        <a id="myHref" href="#" style="color: white"> Gossip Girl USA is an anonymous blog site. I agree not to use people's identities, names, addresses, phone #s or detailed physical descriptions when blogging or commenting.
                                        </a>
                                    </div>
                                    {{--                                </div>--}}
                                    {{--                                <label for="terms-condition" class="col-md-4 col-form-label text-md-end" style="color: white">Agree to terms and conditions</label>--}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="color: white">
                                        2)
                                    <input type="checkbox" required name="terms-condition" value="check" id="agree" />
                                <a href="#" style="color: white"> I agree to keep my own identity anonymous and not use my real name, address, phone number or detailed physical description when blogging or commenting
                                   </a>
                                    </div>
                                </div>
{{--                                <label for="terms-condition" class="col-md-4 col-form-label text-md-end" style="color: white">Agree to terms and conditions</label>--}}
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="color: white">
                                        3)
                                        <input type="checkbox" required name="terms-condition" value="check" id="agree" />
                                        <a href="#" style="color: white">I understand that violating any community guidelines listed here or in the Gossip Girl USA disclaimer will be terms for account deletion.
                                        </a>
                                    </div>
                                </div>
                                {{--                                <label for="terms-condition" class="col-md-4 col-form-label text-md-end" style="color: white">Agree to terms and conditions</label>--}}
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="col-md-12" style="color: white">
                                        4)
                                        <input type="checkbox" required name="terms-condition" value="check" id="agree" />
                                        <a href="#" style="color: white">I agree to all Gossip Girl USA terms & conditions
                                        </a>
                                    </div>
                                </div>
                                {{--                                <label for="terms-condition" class="col-md-4 col-form-label text-md-end" style="color: white">Agree to terms and conditions</label>--}}
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-5 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <strong style="color: white">Sign Up</strong>
                                    </button>
                                </div>
                            </div>
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
