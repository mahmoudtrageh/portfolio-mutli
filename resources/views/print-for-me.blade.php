@extends('layouts.master_home')
@php
$settings = DB::table('settings')->first();
@endphp
@section('title')
    {{ $settings->site_name }} | {{ trans('site/layout.home') }}
@endsection

<style>
#content {
    background-color: #F5F5F5 !important;
}
</style>

@section('home_content')
    <!-- Content
      ============================================= -->

		<section id="content">
			<div class="content-wrap py-0">

				<div class="container">
						<!-- contact -->

						<div class="row mt-5 justify-content-between">

							<div class="col-md-6">
								<div id="contact" class="promo promo-light promo-full mb-0" >
									<div class="container container-fluid clearfix">
				
										<div class="heading-block bottommargin border-bottom-0 center">

										<p class="py-5">{{$settings->print_paragraph}}</p>
											<h3>Print For Me</h3>
										</div>
										
									<div class="row gutter-40 col-mb-80">
										<!-- Post Content
										============================================= -->
										<div class="col-lg-12">
				
											<!-- Contact Form
											============================================= -->


												<form action="{{ route('print.form') }}" class="mb-0" method="POST" enctype="multipart/form-data">
													@csrf
				
										
													<div class="row">
														<div class="col-md-6 form-group">
															<select name="material" class="form-control" required="">
																<option value="" selected="" disabled="">
																	Material</option>
																@foreach ($details as $detail)
																	<option value="{{ $detail->material }}">
																		{{ $detail->material }}
																	</option>
																@endforeach
															</select>

														</div>
															
														<div class="col-md-6 form-group">
															<select name="color" class="form-control" required="">
																<option value="" selected="" disabled="">
																	Color</option>
																@foreach ($details as $detail)
																	<option value="{{ $detail->color }}">
																		{{ $detail->color }}
																	</option>
																@endforeach
															</select>

														</div>
				
														<div class="col-md-12 form-group">
															<input type="file"  name="file" value="" class="required sm-form-control" />
														</div>
														
				
														<div class="w-100"></div>
				
														<div class="col-md-12 form-group">
															<label for="template-contactform-subject">Email <small>*</small></label>
															<input type="email"  name="email" value="" class="required sm-form-control" />
														</div>

														<div class="col-md-12 form-group">
															<label for="template-contactform-subject">Phone <small>*</small></label>
															<input type="number"  name="phone" value="" class="required sm-form-control" />
														</div>
				
														
														<div class="col-12 form-group">
															<button class="button button-3d m-0" type="submit">Submit</button>
														</div>
													</div>
				

												</form>
				
										</div><!-- .postcontent end -->
				
									</div>
									
									</div>
								
								</div>
							</div>

							<div class="col-md-6">
								<!-- Product Single - Gallery
								============================================= -->
								<div class="product-image" dir="ltr">
										<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
											<div class="flexslider">
												<div class="slider-wrap" data-lightbox="gallery">
													@foreach ($details as $detail)
														<div class="slide"
															data-thumb="{{ asset($detail->img) }}"><a
																href="{{ asset($detail->img) }}"
																title="Pink Printed Dress - Front View"
																data-lightbox="gallery-item"><img
																	src="{{ asset($detail->img) }}"
																	alt="Pink Printed Dress"></a></div>
													@endforeach
												</div>
											</div>
										</div>
								</div><!-- Product Single - Gallery End -->
							</div>

						
						</div>
					
				</div>

			</div>
		</section><!-- #content end -->
        
@endsection
