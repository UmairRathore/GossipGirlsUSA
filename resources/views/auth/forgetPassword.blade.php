@extends('auth.auth')
@section('title', 'Forget Password')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert-hide" style="margin-top: 10px">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <div class="card" style="margin-top: 10%;opacity: 0.8;">
                <div class="card-header text-center" style="color: white">Forget Password</div>
                <div class="card-body text-center ">
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
