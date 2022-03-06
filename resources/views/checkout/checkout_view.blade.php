@extends('layouts.master_home')
@section('home_content')

@section('title')
    {{ trans('site.checkout') }}
@endsection


<!-- Page Title
============================================= -->
<section id="page-title" style="background-color: #752651;">

    <div class="container clearfix">
        <h1 class="text-white">الدفع</h1>
        <ol class="breadcrumb">

        </ol>
    </div>

</section><!-- #page-title end -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->

                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>{{ trans('site.shipping-address') }}</b>
                                            </h4>

                                            <form class="register-form" action="{{ route('checkout.store') }}"
                                                method="POST">
                                                @csrf


                                                <div class="form-group">
                                                    <label class="info-title"
                                                        for="exampleInputEmail1"><b>{{ trans('site.shipping-name') }}</b>
                                                        <span>*</span></label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Full Name"
                                                        value="{{ Auth::guard('web')->user()->name }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title"
                                                        for="exampleInputEmail1"><b>{{ trans('site.email') }} </b>
                                                        <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Email"
                                                        value="{{ Auth::guard('web')->user()->email }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title"
                                                        for="exampleInputEmail1"><b>{{ trans('site.phone') }}</b>
                                                        <span>*</span></label>
                                                    <input type="number" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Phone"
                                                        value="{{ Auth::guard('web')->user()->phone }}" required="">
                                                </div> <!-- // end form group  -->


                                                <div class="form-group">
                                                    <label class="info-title"
                                                        for="exampleInputEmail1"><b>{{ trans('site.post-code') }} </b>
                                                        <span>*</span></label>
                                                    <input type="text" name="post_code"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="Post Code" required="">
                                                </div> <!-- // end form group  -->



                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">

                                            <div class="form-group">
                                                <h5><b>{{ trans('admin.province-name') }} </b> <span
                                                        class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="province_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">
                                                            {{ trans('admin.province-name') }}</option>
                                                        @foreach ($provinces as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- // end form group -->

											<div class="form-group">
                                                <label class="info-title"
                                                    for="exampleInputEmail1">{{ trans('site.address') }}
                                                    <span>*</span></label>
                                                <textarea class="form-control" cols="30" rows="5"
                                                    placeholder="{{ trans('site.address') }}" name="address"></textarea>
                                            </div> <!-- // end form group  -->

                                            <div class="form-group">
                                                <label class="info-title"
                                                    for="exampleInputEmail1">{{ trans('site.notes') }}
                                                    <span>*</span></label>
                                                <textarea class="form-control" cols="30" rows="5"
                                                    placeholder="{{ trans('site.notes') }}" name="notes"></textarea>
                                            </div> <!-- // end form group  -->

                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->

                    </div><!-- /.checkout-steps -->
                </div>

                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">{{ trans('site.check-out-progress') }}</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach ($carts as $item)
                                            <li>
                                                <strong>{{ trans('site.image') }}: </strong>
                                                <img src="{{ asset($item->options->image) }}"
                                                    style="height: 50px; width: 50px;">
                                            </li>
											<hr>
                                            <li>
                                                <strong>{{ trans('site.qty') }}: </strong>
                                                ({{ $item->qty }})
                                                                                              
                                            </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            @if (Session::has('coupon'))
                                                <strong>{{ trans('site.sub-total') }}: </strong> ${{ $cartTotal }}
                                                <hr>

                                                <strong>{{ trans('site.coupon-name') }} : </strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>{{ trans('site.coupon-discount') }} : </strong>
                                                ${{ session()->get('coupon')['discount_amount'] }}
                                                <hr>

                                                <strong>{{ trans('site.grand-total') }} : </strong>
                                                ${{ session()->get('coupon')['total_amount'] }}
                                                <hr>
                                            @else
                                                <strong>{{ trans('site.sub-total') }}: </strong> ${{ $cartTotal }}
                                                <hr>

                                                <strong>{{ trans('site.grand-total') }} : </strong>
                                                ${{ $cartTotal }}
                                                <hr>
                                            @endif

                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">{{ trans('site.select-payment-method') }}</h4>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-6">
                                        <label for="">{{ trans('site.cash') }}</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/6.png') }}">
                                    </div> <!-- end col md 4 -->


                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit"
                                    class="btn-upper btn btn-primary checkout-page-button">{{ trans('site.payment-step') }}</button>


                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>







                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
