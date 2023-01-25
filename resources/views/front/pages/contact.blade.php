@extends('front.layout.master')
@section('title', 'GossipGirl - Contact US')
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
                <div class="col-12 col-md-10 col-lg-9">
                    <div class="contact-form">
                        <h5>Get in Touch</h5>
                        <!-- Contact Form -->
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="name" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="email" name="email" id="email" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <input type="text" name="subject" id="subject" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Message</label>
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

    @endsection
