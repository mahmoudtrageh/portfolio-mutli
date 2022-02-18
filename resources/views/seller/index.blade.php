@extends('seller.seller_master')
@section('seller')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-right" role="alert">
            <strong>{{ session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <p>لوحة تحكم البائع</p>
    {{-- @php
	$date = date('d-m-y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');

	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');

    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');

    $pending = App\Models\Order::where('status','pending')->get();

@endphp --}}
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-primary-light rounded w-60 h-60">
                                <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin.today-sale') }}</p>
                                <h3 class="text-white mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-warning-light rounded w-60 h-60">
                                <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin.monthly-sale') }} </p>
                                <h3 class="text-white mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-info-light rounded w-60 h-60">
                                <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin.yearly-sale') }} </p>
                                <h3 class="text-white mb-0 font-weight-500">$ <small class="text-success"> $</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-6">
                    <div class="box overflow-hidden pull-up">
                        <div class="box-body">
                            <div class="icon bg-danger-light rounded w-60 h-60">
                                <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                            </div>
                            <div>
                                <p class="text-mute mt-20 mb-0 font-size-16">{{ trans('admin.pending-orders') }} </p>
                                <h3 class="text-white mb-0 font-weight-500"> <small class="text-success">
                                        {{ trans('admin.order') }} </small></h3>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title align-items-start flex-column">
                                {{ trans('admin.recent-orders') }}

                            </h4>
                        </div>

                        {{-- @php
$orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();

	@endphp --}}

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <thead>

                                        <tr class="text-uppercase bg-lightest">
                                            <th style="min-width: 250px"><span
                                                    class="text-white">{{ trans('admin.date') }}</span></th>
                                            <th style="min-width: 100px"><span
                                                    class="text-fade">{{ trans('admin.invoice') }}</span></th>
                                            <th style="min-width: 100px"><span
                                                    class="text-fade">{{ trans('admin.amount') }}</span></th>
                                            <th style="min-width: 150px"><span
                                                    class="text-fade">{{ trans('admin.payment') }}</span></th>
                                            <th style="min-width: 130px"><span
                                                    class="text-fade">{{ trans('admin.status') }}</span></th>
                                            <th style="min-width: 120px"><span
                                                    class="text-fade">{{ trans('admin.process') }}</span> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @foreach ($orders as $item) --}}
                                        <tr>
                                            {{-- <td class="pl-0 py-8">
				 <span class="text-white font-weight-600 d-block font-size-16">
					@if (session()->get('lang') == 'hi')
					{{Carbon\Carbon::setLocale('ar')}}
					{{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }}
					@else 
					
					{{Carbon\Carbon::setLocale('en')}}
					{{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }}
					@endif
				
				</span>
			</td>

			<td>
				 
				<span class="text-white font-weight-600 d-block font-size-16">
					{{ $item->invoice_no }}
				</span>
			</td>

			<td>
				<span class="text-fade font-weight-600 d-block font-size-16">
					$ {{ $item->amount }}
				</span>
				 
			</td>

			<td>
				 
				<span class="text-white font-weight-600 d-block font-size-16">
					{{ $item->payment_method }}
				</span>
			</td>
			<td>
				<span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
			</td>

			<td class="text-right">
				<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
				<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
			</td> --}}
                                        </tr>
                                        {{-- @endforeach --}}




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
