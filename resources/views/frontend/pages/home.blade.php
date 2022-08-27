@extends('frontend.layouts.app')


@section('frontend-main')
    <!-- Home section-->
    <section id="home">
        <!-- Video background-->
        <div id="video-wrapper">
            <video autoplay="true" loop="true" preload="auto">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
            </video>
        </div>
        <!-- end of video background-->
        <!-- Home slider-->
        <div id="home-slider" class="flexslider">
            <ul class="slides">
                <li>
                    <div class="slide-wrap">
                        <div class="slide-content bold-text">
                            <div class="container">
                                <h6>We are fun and young.</h6>
                                <h1 class="upper smaller">We love design<span class="red-dot"></span></h1>
                                <p><a href="#" class="btn btn-light-out">Read More</a><a href="#"
                                        class="btn btn-color btn-full">Services</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-wrap">
                        <div class="slide-content bold-text">
                            <div class="container">
                                <h6>Video - Animations - Media</h6>
                                <h1 class="upper smaller">We make cool things<span class="red-dot"></span></h1>
                                <p><a href="#" class="btn btn-color">Explore</a><a href="#"
                                        class="btn btn-light-out">Join us</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- end of home slider-->
    </section>
    <!-- end of home section-->
@endsection