@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.pending-reviews-list')}} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>{{trans('site.summary')}}  </th>
								<th>{{trans('admin.comment')}} </th>
								<th>{{trans('admin.user')}} </th>
								<th>{{trans('admin.product')}}  </th>
								<th>{{trans('admin.status')}} </th>
								<th>{{trans('admin.process')}}</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($review as $item)
	 <tr>
		<td> {{ $item->summary }}  </td>
		<td> {{ $item->comment }}  </td>
		<td>  {{ $item->user->name }}  </td>

		<td> {{ $item->product->product_name_en }}  </td>
		<td>
		@if($item->status == 0)
      <span class="badge badge-pill badge-primary">{{trans('admin.pending')}} </span>
       @elseif($item->status == 1)
       <span class="badge badge-pill badge-success">{{trans('admin.publish')}} </span>
		@endif

		  </td>

		<td width="25%">
  <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger">{{trans('admin.approve')}} </a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection