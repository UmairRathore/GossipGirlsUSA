@extends('auth.auth')
@section('title', 'Blogger Sign Up')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="alert-hide" style="margin-top: 10px">
                @if(Session::has('message'))
                    <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                        <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {!! session('msg') !!}
                    </div>
                @endif
            </div>

                <div class="card" style="margin-top: 10%;opacity: 0.8;box-shadow: 30px 50px 60px black;">
                    <div class="card-header text-center" style="color: white">Sign Up as Blogger</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bloggerregistration') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label for="first_name" style="color: white">First Name</label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label for="last_name" style="color: white">Last Name</label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label for="email" style="color: white"> Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="time_in_community" style="color: white">Time in Community</label>
                                        <input id="time_in_community" type="text" class="form-control @error('time_in_community') is-invalid @enderror" name="time_in_community" value="{{ old('time_in_community') }}" required autocomplete="time_in_community" autofocus>
                                        @error('time_in_community')
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
                                        <label for="address" style="color: white">Address</label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="city" style="color: white">City</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="state" style="color: white">State</label>
                                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="zipcode" style="color: white">Zipcode</label>
                                        <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" required autocomplete="zipcode" autofocus>
                                        @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label for="password" style="color: white">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label for="password-confirm" style="color: white">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                        {{--                                        @error('password')--}}
                                        {{--                                        <span class="invalid-feedback" role="alert">--}}
                                        {{--                                            <strong>{{ $message }}</strong>--}}
                                        {{--                                        </span>--}}
                                        {{--                                        @enderror--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label for="description" style="color: white">About Me</label>
                                        <textarea name="description" rows="4" cols="80" class="form-control @error('description') is-invalid @enderror" placeholder="Briefly explain why you want to blog for our community">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });

        $("#myHref").click(function(){
            if(confirm("Redirecting to terms and policy")){
                $("#myHref").attr("href");
            }
            else{
                return false;
            }
        });
        // $(function(){ //ready function
        //     $('#myHref').click(function(){ //click event
        //         alert($(this).attr('href'));
        //     });
        // })
        // function n($) {
        //     alert('Redirecting to terms and policy');
        // }

        // n()
        // $(document).find("#myHref").each(function () {
        //     $(this).on("click", function () {
        //         if(confirm("You want to read terms and policy?")){
        //             var $this = $(this);
        //             alert ($this.attr('href'));
        //         }
        //         else{
        //             return false;
        //         }
        //
        //     });
        // });

    </script>
@endsection
