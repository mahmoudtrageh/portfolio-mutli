@extends('layouts.master_home')
@php
$settings = DB::table('settings')->first();
@endphp
@section('title')
    {{ $settings->site_name }} | {{ trans('site/layout.home') }}
@endsection
@section('home_content')
    <!-- Content
      ============================================= -->

    @include('layouts.body.slider')

		<section id="content">
			<div class="content-wrap py-0">

				<div id="featured_products" class="section m-0 bg-transparent clearfix">
					<div class="container-fluid clearfix">

						<div class="heading-block bottommargin border-bottom-0 center">
							<h3>Featured Products</h3>
						</div>

						<!-- Shop
						============================================= -->
						<div class="row clearfix">
							<!-- Shop - 1
							============================================= -->
							@foreach($products as $product)
							
							@if($product->category->category_name == 'products')
							<div class="col-sm-3 col-12 product showcase-section clearfix">
							    
							       @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
					     @if ($discount >= 0)
                                                <div class="sale-flash badge badge-secondary p-2">

                                                   {{ round($discount) }} % Off 

                                                </div>
                                            @endif
                               
								<img alt="Image"  src="{{ asset($product->product_thambnail) }}">
								<div class="product-desc list-inline center">
									
									<div class="product-title mt-2">
										<h3><a href="#" class="fw-normal">{{$product->product_name}}</h3>
									</div>
									<div class="product-price">{{ $product->discount_price }} EGP</div>
									
									<a href="https://api.whatsapp.com/send?phone=+2{{$settings->phone_one}}" class="icon-whatsapp" style="right:auto;left:30px;display:block;font-size:20px;"> Order </a>
								</div>
							</div><!-- Shop End -->
							@endif
							@endforeach
						</div> <!-- Row End -->
					</div> <!-- Container End -->
				</div> <!-- Shop Section End -->

				<!-- Promo Section
				============================================= -->
				<div class="text-center promo promo-border promo-dark promo-full mb-0" style="padding: 60px 0 !important">
				 <p style="font-size:20px;display:inline-block;" class="text-center text-white p-0 m-0">  We Recieve all orders through whatsapp </p> <a href="https://api.whatsapp.com/send?phone=+2{{$settings->phone_one}}"><i style="font-size:20px;" class="ml-3 icon-whatsapp"></i></a>
				</div> <!-- Promo Section End -->

				<!-- Section 1
				============================================= -->
				<div id="printer" class="section section-product m-0" style="padding-top: 70px;">
				    @foreach($products as $product)
							@if($product->category->category_name == 'printer')
					<div class="container clearfix">
					    @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
					     @if ($discount >= 0)
                                                <div class="sale-flash badge badge-secondary p-2">

                                                   {{ round($discount) }} % Off 

                                                </div>
                                            @endif
						<div class="section-product-image">
							<img height="500" style="width:100%" src="{{ asset($product->product_thambnail) }}" alt="Image">
						</div>
						<div class="section-product-content edge-underline" data-bottom-top="transform: translateY(0px);" data-top-bottom="transform: translateY(-100px);">
							<h3>{{$product->product_name}}</h3>
							<p>{!!substr($product->long_desc, 0, 100)!!}</p>
							<div class="row justify-content-center clearfix">
								<div class="col-6 align-items-center">
									<div class="section-product-price">{{$product->discount_price}} EGP</div>
								</div>
								<div class="col-6 align-items-center">
									<a target="_blank" href="{{route('printer.details',$product->id)}}" class="button button-border button-circle button-fill fill-from-bottom button-dark button-black nott fw-normal m-0"><span>Available Options</span></a>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>

				<!-- Features
				============================================= -->
				<div class="container">
				    
				    	<div class="my-5 heading-block bottommargin border-bottom-0 center">
    							<h3>Our Services</h3>
    						</div>
    						
					<div class="row col-mb-50 mb-0 mt-5">
						<!-- Feature - 1
						============================================= -->
						@foreach($services as $service)
						<div class="col-md-4">
							<div class="feature-box fbox-plain flex-column fbox-sm">
								<div class="fbox-icon mb-3">
									<i class="{{$service->icon}}"></i>
								</div>
								<div class="fbox-content">
									<h3>{{$service->title}}</h3>
									<p>{{$service->desc}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					
					
					<!-- Section Courses
				============================================= -->
			
				<div class="section topmargin-lg parallax mt-0" data-bottom-top="background-position:0px 100px;" data-top-bottom="background-position:0px -500px;">

					<div class="container">

						<div class="heading-block border-bottom-0 mb-5 center">
							<h3>Our Courses</h3>
						</div>

						<div class="clear"></div>

						<div class="row mt-2">

							<!-- Course 1
							============================================= -->
								@foreach($products as $product)
							@if($product->category->category_name == 'printer')
							<div class="col-md-12 mb-5">
								<div class="card course-card hover-effect border-0">
								      @php
                                                $amount = $product->selling_price - $product->discount_price;
                                                $discount = ($amount / $product->selling_price) * 100;
                                            @endphp
					     @if ($discount >= 0)
                                                <div class="sale-flash badge badge-secondary p-2">

                                                   {{ round($discount) }} % Off 

                                                </div>
                                            @endif
									<a href="#"><img height="500" style="width:100%" class="card-img-top" src="{{ asset($product->product_thambnail) }}" alt="Card image cap"></a>
									<div class="card-body">
										<h4 class="card-title fw-bold mb-2"><a href="#">{{$product->product_name}}</a></h4>
										<p class="mb-2 card-title-sub text-uppercase fw-normal ls1"><a href="#" class="text-black-50">{{$product->category->category_name}}</a></p>
									
										<p class="card-text text-black-50 mb-1">{!!substr($product->long_desc, 0, 100)!!}</p>
									</div>
									<div class="py-3 d-flex justify-content-between align-items-center bg-white text-muted">
										<div class="px-3"><h2>{{$product->discount_price}} EGP</h2></div>
									
									</div>
								</div>
							</div>
							
							@endif
							
							@endforeach

						</div>
					</div>

					<!-- Wave Shape Divider - Bottom
					============================================= -->
					<div class="wave-bottom" style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('demos/course/images/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);"></div>
				</div>
					
				
				</div><!-- Container End -->
				
					<!-- contact -->
					
					<div id="contact" class="promo promo-light promo-full topmargin-sm mb-0" style="padding: 50px 0 !important;">
    					<div class="container container-fluid clearfix">
    
    						<div class="heading-block bottommargin border-bottom-0 center">
    							<h3>Send us an Email</h3>
    						</div>
                            
                        <div class="row gutter-40 col-mb-80">
    						<!-- Post Content
    						============================================= -->
    						<div class="postcontent col-lg-12">
    
    							<!-- Contact Form
    							============================================= -->

    							<div class="form-widget">
    
    								<div class="form-result"></div>
    
    								<form action="{{ route('contact.form') }}" class="mb-0" method="POST">
    								    @csrf
    
    						
    									<div class="row">
    										<div class="col-md-6 form-group">
    											<label for="template-contactform-name">Name <small>*</small></label>
    											<input type="text"  name="name" value="" class="sm-form-control required" />
    										</div>
    
    										<div class="col-md-6 form-group">
    											<label for="template-contactform-email">Email <small>*</small></label>
    											<input type="email"  name="email" value="" class="required email sm-form-control" />
    										</div>
    
    										
    
    										<div class="w-100"></div>
    
    										<div class="col-md-12 form-group">
    											<label for="template-contactform-subject">Subject <small>*</small></label>
    											<input type="text"  name="subject" value="" class="required sm-form-control" />
    										</div>
    
    									
    										<div class="w-100"></div>
    

    										<div class="col-12 form-group">
    											<label for="template-contactform-message">Message <small>*</small></label>
    											<textarea class="required sm-form-control" id="template-contactform-message" name="message" rows="6" cols="30"></textarea>
    										</div>
    
    										
    
    										<div class="col-12 form-group">
    											<button class="button button-3d m-0" type="submit">Send Message</button>
    										</div>
    									</div>
    

    								</form>
    							</div>
    
    						</div><!-- .postcontent end -->
    
    					</div>
    					
    					</div>
					
					</div>

			</div>
		</section><!-- #content end -->
@endsection
