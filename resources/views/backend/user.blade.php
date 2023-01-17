@extends('backend.layouts.app',['pageSlug'=>'profile'])
@section('title', $user->first_name)
@section('content')
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
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
                                    <label for="first_name" style="color: white">First Name</label>
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
                                    <label for="last_name" style="color: white">Last Name</label>
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
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label for="email" style="color: white"> Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ,old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @if(auth()->user()->role_id===3)

                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="phone_number" style="color: white">Time in Community</label>
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number ,old('phone_number') }}"  autocomplete="phone_number" autofocus>
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label for="time_in_community" style="color: white">Time in Community</label>
                                        <input id="time_in_community" type="text" class="form-control @error('time_in_community') is-invalid @enderror" name="time_in_community" value="{{ $user->time_in_community ,old('time_in_community') }}"  autocomplete="time_in_community" autofocus>
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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address ,old('address') }}"  autocomplete="address" autofocus>
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
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city ,old('city') }}"  autocomplete="city" autofocus>
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
                                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $user->state ,old('state') }}"  autocomplete="state" autofocus>
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
                                    <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $user->zipcode ,old('zipcode') }}"  autocomplete="zipcode" autofocus>
                                    @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            @endif
                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <div class="form-group">
                                    <label for="password" style="color: white">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Your password will remain same, if left empty.</small><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pr-md-1">
                                <div class="form-group">
                                    <label for="description" style="color: white">About Me</label>
                                    <textarea name="description" wrap=physical rows="4" cols="80" class="form-control @error('description') is-invalid @enderror" placeholder="Briefly explain why you want to blog for our community">{{ $user->description , old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
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
        </div>
    </div>

@endsection
