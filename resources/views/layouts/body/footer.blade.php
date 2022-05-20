<!-- Footer
		============================================= -->
		<footer id="footer" class="border-0 bg-transparent">

			<div class="container clearfix">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row">
						<div class="col-6 col-sm">
							<img class="mb-2" src="{{$settings->logo}}" alt="Image" width="30">
							<p>{{$abouts->long_dis}}</p>
							
							@php
							    $settings = DB::table('settings')->first();
							@endphp
						
							<div class="w-100 d-flex">
								<a href="{{$settings->facebook}}" class="social-icon si-colored si-rounded si-mini si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
							
								<a href="{{$settings->youtube}}" class="social-icon si-colored si-rounded si-mini si-youtube">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>
								<a href="{{$settings->instagram}}" class="social-icon si-colored si-rounded si-mini si-appstore">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>
							</div>
							<div>
							
							</div>
						</div>

						<div class="col-6 col-sm mt-4 mt-sm-0 mt-md-0 mt-lg-0 mt-xl-0">
							<h4>Contacts</h4>
							<ul class="list-unstyled mb-0 text-small">
								<li><span>{{$settings->email}}</span></li>
								<li><span>+{{$settings->phone_one}}</span></li>
							</ul>
						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

		</footer><!-- #footer end -->