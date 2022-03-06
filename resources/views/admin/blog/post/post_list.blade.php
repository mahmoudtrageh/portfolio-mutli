@extends('admin.admin_master')
@section('admin')

<style>
	.add-post{
		float:left;
	}
</style>


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">{{trans('admin.blog-post-list')}} <span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></h3>
<a href="{{ route('add.post') }}" class="btn btn-success add-post">{{trans('admin.add-post')}}</a>				  
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								 
								<th>{{trans('admin.post-category')}}  </th>
								<th>{{trans('admin.post-image')}} </th>
								<th>{{trans('admin.post-title')}}</th>
								<th>{{trans('admin.process')}}</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($blogpost as $item)
	 <tr>
		 
		 <td>{{ $item->category->blog_category_name }}</td>
		 <td> <img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"> </td>
		<td>{{ $item->post_title }}</td>
		<td width="20%">
 <a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info" title="{{trans('admin.edit')}}"><i class="fa fa-pencil"></i> </a>
 <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" title="{{trans('admin.delete')}}" id="delete">
 	<i class="fa fa-trash"></i></a>
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