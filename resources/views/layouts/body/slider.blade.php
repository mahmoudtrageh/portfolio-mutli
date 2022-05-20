<style>
     .slide {
            object-fit: cover;
            object-position: top;
        }
</style>

<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 include-header">
			<div class="slider-inner">

				<!-- Flex Slide
				============================================= -->
				<div class="fslider h-100 position-absolute dark" data-speed="1500" data-autoplay="true" data-pause="6000" data-animation="fade" data-arrows="false" data-pagi="false" data-hover="false" data-touch="false">
					<div class="flexslider">
						<div class="slider-wrap">
						    
						    @php 
 $sliders = DB::table('sliders')->get();
@endphp

 @foreach($sliders as $key => $slider)
							<div class="slide" style="background: url({{asset($slider->slider_img)}}) center center; background-size: cover;">
								<div class="vertical-middle">
									<div class="container">
										<div class="row justify-content-center">
											<div class="col-md-7">
												<div class="heading-block border-bottom-0 parallax mb-0" data-0="opacity: 1;margin-top:0px" data-800="opacity: 0.2;margin-top:150px">
													<h2 class="mb-4">{{$slider->title}}</h2>
													<a href="#{{$slider->description}}" class="button button-border button-circle button-fill fill-from-bottom button-white button-light nott fw-normal"><span>View Details</span></a>
												</div>
											</div>
											<div class="col-md-5 align-self-lg-center align-self-md-baseline">
												<a href="https://www.youtube.com/watch?v=X-dO2XnUsKc" class="play-icon" data-lightbox="iframe"><i class="icon-googleplay"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							@endforeach
						
						</div>
					</div>
				</div>

				<!-- Slider Bottom Content
				<!--============================================= -->
				<!--<div class="slider-product-desc dark">-->
				<!--	<div class="row m-0 d-none d-md-flex">-->
				<!--		<div class="col-md-6" style="border-right: 1px solid rgba(255,255,255,0.08);">-->
				<!--			<div class="feature-box fbox-dark fbox-plain mb-0">-->
				<!--				<div class="fbox-icon">-->
				<!--					<a href="#"><i class="icon-line2-earphones"></i></a>-->
				<!--				</div>-->
				<!--				<div class="fbox-content">-->
				<!--					<h3 class="fw-normal mb-3">Wireless Noise Cancelling</h3>-->
				<!--					<p class="d-none d-lg-block">With the HD 4.50 BTNC, The noisy world around you is shut out by NoiseGard™, the active noise cancellation technology developed by Sennheiser.</p>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</div>-->

				<!--		<div class="col-md-6">-->
				<!--			<div class="feature-box fbox-dark fbox-plain mb-0">-->
				<!--				<div class="fbox-icon">-->
				<!--					<a href="#"><i class="icon-line2-power"></i></a>-->
				<!--				</div>-->
				<!--				<div class="fbox-content">-->
				<!--					<h3 class="fw-normal mb-3">Long-Lasting Battery</h3>-->
				<!--					<p class="d-none d-lg-block">Real adventures happen far away from power outlets. Fortunately, the HD 4.50 BTNC has a powerful battery that lets you enjoy music for up to 25 hours.</p>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->

			</div>
		</section>
