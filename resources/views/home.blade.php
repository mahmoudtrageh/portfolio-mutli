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

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h3>{{ $abouts->short_dis }}</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>
                        {{ $abouts->long_dis }}
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <section id="content">
        <div class="content-wrap">

            <div class="row section clearfix services card-deck" style="background-color: #752651;overflow:visible;margin-top:80px;padding:100px 0 !important;">
                <div class="shape-divider" data-shape="wave" data-height="90" data-outside="true" data-flip-vertical="true" data-fill="#752651"></div>
                @php
                    $services = DB::table('services')
                        ->latest()
                        ->get();
                @endphp
                @foreach ($services as $service)
                    <div class="col-lg-4 center bottommargin shadow card bg-transparent border-0">
                        <i class="{{ $service->icon }}" style="margin-bottom: 20px;color:#1FBADF;"></i>
                        <div class="heading-block border-bottom-0" style="margin-bottom: 15px;">
                            <h4>{{ $service->title }}</h4>
                        </div>
                        <p style="color:#fff;">{{ $service->desc }}</p>
                    </div>
                @endforeach
                <div class="shape-divider" data-shape="wave" data-position="bottom"></div>
            </div>

            <div class="container clearfix">

                <div id="portfolio" class="mt-0"></div>

                @php
                    $portfolio = DB::table('portfolios')
                        ->latest()
                        ->get();
                @endphp
                <h3 class="center">{{ trans('site/body.latest-work') }}<span
                        class="badge badge-danger mx-1">{{ count($portfolio) }}</span></h3>

                <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="1"
                    data-loop="true" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
                    data-items-lg="4" data-items-xl="4">

                    @foreach ($portfolio as $item)
                        <div class="portfolio-item">
                            <div class="portfolio-image position-relative">
                                <a href="portfolio-single.html">
                                    <img src="{{ $item->img }}" alt="Open Imagination">
                                </a>
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                        <a target="_blank" href="{{ $item->url }}"
                                            class="overlay-trigger-icon bg-light text-dark"
                                            data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                                            data-hover-speed="350"><i class="fa-solid fa-link"></i></a>
                                    </div>
                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-desc">
                                <h3><a target="_blank" href="{{ $item->url }}">{{ $item->name }}</a></h3>
                                <span>{{ $item->tag }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="line"></div>

                <h3 class="center">{{ trans('site/body.what-clients-say') }}</h3>

                <div class="fslider testimonial testimonial-full shadow-none border-0 p-0 mx-auto" data-animation="fade"
                    data-arrows="false" style="max-width: 700px;">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            @php
                                $testmonials = DB::table('testmonials')
                                    ->latest()
                                    ->get();
                            @endphp
                            @foreach ($testmonials as $testmonial)
                                <div class="slide">
                                    <div class="testi-content">
                                        <p>{{ $testmonial->text }}</p>
                                        <div class="testi-meta">
                                            {{ $testmonial->user }}

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div id="testmonials" class="line"></div>

                <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="100" data-loop="true"
                    data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3"
                    data-items-md="4" data-items-lg="5" data-items-xl="6">
                    @php
                        $clients = DB::table('clients')
                            ->latest()
                            ->get();
                    @endphp
                    @foreach ($clients as $client)
                        <div class="oc-item"><a href="#"><img class="img-fluid m-auto" style="width:120px;height:70px;" src="{{ $client->image }}"
                                    alt="Clients"></a></div>
                    @endforeach

                </div>

            </div>
        </div>
    </section><!-- #content end -->

    <!-- Content
      ============================================= -->
    <section class="contact">

        <div class="row mx-0 section mb-0" style="background-color: rgb(117, 38, 81,0.3);padding:100px 0;" id="contact">
            <div class="shape-divider" data-shape="wave-4" data-height="150" id="shape-divider-6017"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 140" preserveAspectRatio="none"><path class="shape-divider-fill" fill="#F8F7F2" d="M0 51.76c36.21-2.25 77.57-3.58 126.42-3.58 320 0 320 57 640 57 271.15 0 312.58-40.91 513.58-53.4V0H0z" opacity="0.3"></path><path class="shape-divider-fill" d="M0 24.31c43.46-5.69 94.56-9.25 158.42-9.25 320 0 320 89.24 640 89.24 256.13 0 307.28-57.16 481.58-80V0H0z" opacity="0.5"></path><path class="shape-divider-fill" d="M0 0v3.4C28.2 1.6 59.4.59 94.42.59c320 0 320 84.3 640 84.3 285 0 316.17-66.85 545.58-81.49V0z"></path></svg></div>
            <!-- Postcontent
        ============================================= -->
            <div class="postcontent col-lg-9">

                <h3>{{ trans('site/body.contact-us') }}</h3>

                <form class="mb-0" action="{{ route('contact.form') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="template-contactform-name">{{ trans('site/body.name') }} <small>*</small></label>
                            <input type="text" name="name" class="form-control" placeholder="{{ trans('site/body.name') }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="template-contactform-email">{{ trans('site/layout.email') }} <small>*</small></label>
                            <input type="email" class="form-control" name="email" placeholder="{{ trans('site/layout.email') }}" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-8 form-group">
                            <label for="template-contactform-subject">{{ trans('site/body.subject') }} <small>*</small></label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{ trans('site/body.subject') }}" />
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-12 form-group">
                            <label for="template-contactform-message">{{ trans('site/body.message') }} <small>*</small></label>
                            <textarea class="form-control" name="message" rows="5" placeholder="{{ trans('site/body.message') }}"></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d m-0" type="submit">{{ trans('site/body.send') }}</button>
                        </div>
                    </div>

                </form>

            </div><!-- .postcontent end -->
            @php
                $settings = DB::table('settings')->first();
            @endphp
            <!-- Sidebar
        ============================================= -->
            <div class="sidebar col-lg-3">

                <address>
                    <strong>{{ trans('site/body.address') }}:</strong><br>
                    {{ $settings->address }}<br>
                </address>
                <abbr title="Phone Number"><strong>{{ trans('site/layout.phone') }}:</strong></abbr> {{ $settings->phone_one }}<br>
                <abbr title="Email Address"><strong>{{ trans('site/layout.email') }}:</strong></abbr> {{ $settings->email }}

                <div class="widget border-0 pt-0">

                </div>

                <div class="widget border-0 pt-0 socials">

                    <a href="{{ $settings->facebook }}" class="social-icon si-small si-dark si-facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="{{ $settings->twitter }}" class="social-icon si-small si-dark si-twitter">
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-twitter"></i>
                    </a>

                    <a href="{{ $settings->youtube }}" class="social-icon si-small si-dark si-youtube">
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="{{ $settings->linkedin }}" class="social-icon si-small si-dark si-linkedin">
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-linkedin"></i>
                    </a>

                    <a href="{{ $settings->github }}" class="social-icon si-small si-dark si-github">
                        <i class="fa-brands fa-github"></i>
                        <i class="fa-brands fa-github"></i>
                    </a>

                </div>

            </div><!-- .sidebar end -->
        </div>

    </section><!-- #content end -->
@endsection
