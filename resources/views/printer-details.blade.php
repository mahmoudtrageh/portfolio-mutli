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
            <div class="row mt-5 justify-content-between">
                <div class="col-md-6">
                    <!-- Product Single - Gallery
                    ============================================= -->
                    <div class="product-image" dir="ltr">
                            <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        @foreach ($multiImag as $img)
                                            <div class="slide"
                                                data-thumb="{{ asset($img->photo_name) }}"><a
                                                    href="{{ asset($img->photo_name) }}"
                                                    title="Pink Printed Dress - Front View"
                                                    data-lightbox="gallery-item"><img
                                                        src="{{ asset($img->photo_name) }}"
                                                        alt="Pink Printed Dress"></a></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount / $product->selling_price) * 100;
                            @endphp
                            <div class="sale-flash badge badge-danger p-2">
                                @if ($discount >= 0)
                                    % {{ trans('site/body.discount') }} {{ round($discount) }}
                                @endif
                            </div>
                    </div><!-- Product Single - Gallery End -->
                </div>
                <div class="col-md-4">
                    <h2>Available Options</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" id="basic" value="8000" checked>
                        <label class="form-check-label" for="basic">
                            Basic   
                        </label>
                    </div>

                    <div class="driver-container border p-3 my-3">
                        <p class="alert alert-danger pl-2 p-0"> * choose only one type</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="2tmc" value="300">
                            <label class="form-check-label" for="2tmc">
                                2 TMC Drivers
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="4tmc" value="550">
                            <label class="form-check-label" for="4tmc">
                                4 TMC Drivers
                            </label>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" id="filament-runout" value="150">
                        <label class="form-check-label" for="filament-runout">
                            Filament Runout Sensor
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" id="auto-bed" value="300">
                        <label class="form-check-label" for="auto-bed">
                            Auto bed Leveling  
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="exampleRadios" id="magnetic-heat" value="350">
                        <label class="form-check-label" for="magnetic-heat">
                            Magnetic heat bed
                        </label>
                    </div>


                    <h2 class="mt-5">Price iS: <span id="total-price"></span> EGP</h2>

                    <a href="https://api.whatsapp.com/send?phone=+2{{$settings->phone_one}}" class="mt-5 button button-border button-circle button-fill fill-from-bottom button-dark button-black nott fw-normal m-0"><span>Buy Now</span></a>
                        
                </div>
            </div>

            </div>
            				
			</div>
		</section><!-- #content end -->

@endsection

@section('js')

<script>
    
    var basic = document.getElementById("basic");
    var tmc2 = document.getElementById("2tmc");
    var totalPrice = document.getElementById("total-price");
    var tmc4 = document.getElementById("4tmc");
    var noDriver = document.getElementById("no-driver");

    var filamentRunout = document.getElementById("filament-runout");
    var autoBed = document.getElementById("auto-bed");
    var magneticHeat = document.getElementById("magnetic-heat");

    totalPrice.innerText = parseInt(basic.value);

    basic.oninput = function(){
        //this is called when it changes
        if(basic.checked){
            //it is checked
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(basic.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(basic.value);
        }
    }

    tmc2.oninput = function(){
        if(tmc2.checked){
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(tmc2.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(tmc2.value);
        }
    }

    tmc4.oninput = function(){
        if(tmc4.checked){
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(tmc4.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(tmc4.value);
        }
    }

    

    filamentRunout.oninput = function(){
        if(filamentRunout.checked){
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(filamentRunout.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(filamentRunout.value);
        }
    }

    autoBed.oninput = function(){
        if(autoBed.checked){
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(autoBed.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(autoBed.value);
        }
    }

    magneticHeat.oninput = function(){
        if(magneticHeat.checked){
            totalPrice.innerText = parseInt(totalPrice.innerText) + parseInt(magneticHeat.value);
        
        } else  {
            totalPrice.innerText = parseInt(totalPrice.innerText) - parseInt(magneticHeat.value);
        }
    }
    

// scroll down end
</script>
@endsection
