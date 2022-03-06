@extends('layouts.master_home')
@section('home_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    {{ trans('site.cash-on-delivery') }}
@endsection




<!-- Page Title
============================================= -->
<section id="page-title" style="background-color: #752651;">

    <div class="container clearfix">
        <h1 class="text-white">الدفع / كاش</h1>
        <ol class="breadcrumb">

        </ol>
    </div>

</section><!-- #page-title end -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row mt-5">

                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">{{ trans('site.your-shopping-amount') }}</h4>
                                </div>
                                <div class="">
                                    <ul class="nav-checkout-progress list-unstyled">


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
                </div> <!--  // end col md 6 -->







                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">{{ trans('site.select-payment-method') }}</h4>
                                </div>

                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">

                                        <img src="{{ asset('frontend/assets/images/payments/cash.png') }}">

                                        <label for="card-element">

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="province_id"
                                                value="{{ $data['province_id'] }}">
                                            <input type="hidden" name="address" value="{{ $data['address'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                                        </label>




                                    </div>
                                    <br>
                                    <button class="btn btn-primary">{{ trans('site.submit-payment') }}</button>
                                </form>



                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div><!--  // end col md 6 -->







                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
