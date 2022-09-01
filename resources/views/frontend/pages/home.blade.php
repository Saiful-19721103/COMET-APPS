@extends('frontend.layouts.app')


@section('frontend-main')
<!-- Home Section-->
<section id="home">
 <!-- Home Slider-->
 <div id="home-slider" class="flexslider">

  <ul class="slides">
   @php
   $sliders=App\Models\Slider::latest()->get();
   @endphp

   @foreach($sliders as $slider)
   <li>
    <img src="{{url ('storage/sliders/' . $slider->photo)}}" alt="">
    <div class="slide-wrap">
     <div class="slide-content">
      <div class="container">
       <h1>{{$slider->title}}<span class="red-dot"></span></h1>
       <h6>{{$slider->subtitle}}</h6>
       <p><a href="#" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a>
       </p>
      </div>
     </div>
    </div>
   </li>
   @endforeach
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