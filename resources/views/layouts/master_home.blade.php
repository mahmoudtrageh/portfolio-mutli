<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,800&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/css/swiper.css')}}" type="text/css" />

	<!-- Headphones Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('home/assets/demos/headphones/headphones.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/demos/headphones/css/fonts.css')}}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('home/assets/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('home/assets/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Headphones Demo Theme Color -->
	<link rel="stylesheet" href="{{ asset('home/assets/css/colors.php?color=333')}}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('home/assets/demos/shop/shop.css') }}" type="text/css" />
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


	<!-- Document Title
	============================================= -->
	<title>Twins Solution</title>

<style>
    #logo .standard-logo img, .footer-widgets-wrap img {
        width:70px;
        height:70px !important;
        border-radius: 50% !important;
    }

    #header.transparent-header.dark {
        background:#333;
    }

    .dark .menu-link, .dark .header-misc-icon > a {
        color:#fff;
    }
</style>

</head>

<body data-spy="scroll" data-target=".slide" data-offset="300" class="stretched" data-loader="12">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">

        @include('layouts.body.header')

	
        <main id="main">

            @yield('home_content')

        </main><!-- End #main -->

        @include('layouts.body.footer')


    </div><!-- #wrapper end -->

	@php
							    $settings = DB::table('settings')->first();
							@endphp
							
    <!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-line-arrow-up"></div>
	
	 <!-- Go To Top
	============================================= -->
    <a href="https://api.whatsapp.com/send?phone=+2{{$settings->phone_one}}" id="gotoTop" class="icon-whatsapp" style="right:auto;left:30px;display:block;"> </a>
    <!-- JavaScripts

      // Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="max-width:50%;">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">

                  <div class="row">

                      <div class="col-md-4">

                          <div class="card" style="width: 18rem;">

                              <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;"
                                  id="pimage">

                          </div>

                      </div><!-- // end col md -->


                      <div class="col-md-4">

                          <ul class="list-group">
                              <li class="list-group-item">{{ trans('site/body.price') }}: <strong
                                      class="text-danger">$<span id="pprice"></span></strong>
                                  <del id="oldprice">$</del>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.product-code') }}: <strong id="pcode"></strong>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.category') }}: <strong
                                      id="pcategory"></strong></li>
                              </li>
                              <li class="list-group-item">{{ trans('site/body.stock') }}: <span
                                      class="badge badge-pill badge-success" id="aviable"
                                      style="background: green; color: white;"></span>
                                  <span class="badge badge-pill badge-danger" id="stockout"
                                      style="background: red; color: white;"></span>

                              </li>
                          </ul>

                      </div><!-- // end col md -->

                      <div class="col-md-4">

                          <div class="form-group">
                              <label for="qty">{{ trans('site/body.qty') }}</label>
                              <input type="number" class="form-control" id="qty" value="1" min="1">
                          </div> <!-- // end form group -->

                          <input type="hidden" id="product_id">
                          <button type="submit" class="btn btn-primary mb-2"
                              onclick="addToCart()">{{ trans('site/body.add-to-cart') }}</button>

                      </div><!-- // end col md -->

                  </div> <!-- // end row -->

              </div> <!-- // end modal Body -->

          </div>
      </div>
  </div>
  <!-- End Add to Cart Product Modal -->

    <script src="{{ asset('home/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('home/assets/js/plugins.min.js') }}"></script>

    <!-- Footer Scripts
============================================= -->
    <script src="{{ asset('home/assets/js/functions.js') }}"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })

		
// scroll down start
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 800);
    });

// scroll down end
	</script>

    

    @yield('js')

</body>

</html>
