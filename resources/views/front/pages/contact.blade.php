@extends('front.layout.master')
@section('subject', 'GossipGirl - Contact US')
@section('content')
    <!-- ##### Google Map ##### -->
{{--    <div class="map-area">--}}
{{--        <div id="googleMap" class="googleMap"></div>--}}
{{--    </div>--}}

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Contact Form Area -->
                <div class="alert-hide" style="margin-top: 10px">
                    @if(Session::has('message'))
                        <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                            <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {!! session('msg') !!}
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-10 col-lg-9">
                    <div class="contact-form">
                        <h5>Get in Touch</h5>
                        <!-- Contact Form -->
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>subject</label>
                                        @error('Subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" rows="4" cols="80" class= "form-control @error('message') is-invalid @enderror" required autocomplete="message" autofocus>
                                            {{ old('message') }}
                                        </textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Message</label>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn original-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

{{--                <div class="col-12 col-md-10 col-lg-3">--}}
{{--                    <div class="post-sidebar-area">--}}

{{--                        <!-- Widget Area -->--}}


{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
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
