@php 
 $sliders = DB::table('sliders')->get();

@endphp
<section id="slider" class="slider-element" style="margin-bottom: 80px;">

    <div id="oc-slider" class="owl-carousel carousel-widget" data-items="1" data-loop="true" data-nav="true" data-autoplay="5000" data-animate-in="fadeIn" data-animate-out="fadeOut" data-speed="800">
      @foreach($sliders as $key => $slider)
     <img src="{{asset($slider->slider_img)}}" alt="Slider">
      @endforeach

    </div>

</section>

