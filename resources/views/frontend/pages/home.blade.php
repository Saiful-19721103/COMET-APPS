@extends('frontend.layouts.app')


@section('frontend-main')
<!-- Home Section-->
<section id="home">
 <!-- Home Slider-->
 <div id="home-slider" class="flexslider">
  <ul class="slides">
   <li>
    <img src="frontend/images/bg/1.jpg" alt="">
    <div class="slide-wrap">
     <div class="slide-content">
      <div class="container">
       <h1>Digital Power<span class="red-dot"></span></h1>
       <h6>We are a small design studio from San Francisco.</h6>
       <p><a href="#" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a>
       </p>
      </div>
     </div>
    </div>
   </li>
   <li>
    <img src="frontend/images/bg/2.jpg" alt="">
    <div class="slide-wrap">
     <div class="slide-content">
      <div class="container">
       <h1>We Are Comet<span class="red-dot"></span></h1>
       <h6>Experts in web design and development.</h6>
       <p><a href="#" class="btn btn-color">Explore</a><a href="#" class="btn btn-light-out">Join us</a>
       </p>
      </div>
     </div>
    </div>
   </li>
  </ul>
 </div>
 <!-- End Home Slider-->
</section>
<!-- End Home Section-->

<!--About section-->
@include('frontend.sections.title')
<!--About section-->

<!--Expertise section-->
@include('frontend.sections.expertise')
<!--Expertise section-->

<!--Vision section-->
@include('frontend.sections.vision')
<!--Vision section-->

<!--Portfolio section-->
@include('frontend.sections.portfolio')
<!--Portfolio section-->

<!--Clients section-->
@include('frontend.sections.clients')
<!--Clients section-->

<!--Testimonials section-->
@include('frontend.sections.testimonials')
<!--Testimonials section-->

<!--Blog section-->
@include('frontend.sections.blog')
<!--Blog section-->

@endsection