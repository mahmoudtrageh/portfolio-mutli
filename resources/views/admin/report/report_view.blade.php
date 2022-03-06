@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

	 


<!--   ------------ Add Search Page -------- -->


          <div class="col-lg-4 col-md-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.search-by-date')}} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-date') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>{{trans('admin.select-date')}} <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="date" class="form-control" > 
	 @error('date') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
 	 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{trans('admin.search')}}">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




			<div class="col-lg-4 col-md-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.search-by-month')}} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-month') }}">
	 	@csrf
					   

	 <div class="form-group">
		<h5>{{trans('admin.select-month')}}  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="month" class="form-control">
			<option label="{{trans('admin.choose-one')}}"></option>
			<option value="January">{{trans('admin.january')}}</option>
			<option value="February">{{trans('admin.february')}}</option>
			<option value="March">{{trans('admin.march')}}</option>
			<option value="April">{{trans('admin.april')}}</option>
			<option value="May">{{trans('admin.may')}}</option>
			<option value="Jun">{{trans('admin.june')}}</option>
			<option value="July">{{trans('admin.july')}}</option>
			<option value="August">{{trans('admin.august')}}</option>
			<option value="September">{{trans('admin.september')}}</option>
			<option value="October">{{trans('admin.october')}}</option>
			<option value="November">{{trans('admin.november')}}</option>
			<option value="December">{{trans('admin.december')}}</option>


		</select> 

	 @error('month') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div> 


 <div class="form-group">
		<h5>{{trans('admin.select-year')}}  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year_name" class="form-control">
			<option label="{{trans('admin.choose-one')}}"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{trans('admin.search')}}">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>





			<div class="col-lg-4 col-md-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.select-year')}} </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('search-by-year') }}" >
	 	@csrf
					   
<div class="form-group">
		<h5>{{trans('admin.select-year')}}  <span class="text-danger">*</span></h5>
		<div class="controls">
	
		<select name="year" class="form-control">
			<option label="{{trans('admin.choose-one')}}"></option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option> 
		</select> 

	 @error('year') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>   

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="{{trans('admin.search')}}">					 
						</div>
					</form>
 
					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>








 <!--   ------------End  Add Search Page -------- -->


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection