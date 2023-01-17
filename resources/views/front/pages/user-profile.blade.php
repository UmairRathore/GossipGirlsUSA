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
                    <form method="POST" action="{{ route('profile-update',[$user->id]) }}">
                        {{--                        {{dd($user->id)}}--}}
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="first_name" style="color: black">First Name</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{  $user->first_name ,old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label for="last_name" style="color: black">Last Name</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name ,old('last_name') }}" required autocomplete="last_name" autofocus>
                                    @error('last_name')
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

@endsection
