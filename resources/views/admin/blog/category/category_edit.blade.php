@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">






                <!--   ------------ Add Blog Category Page -------- -->


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.edit-blog-category') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('blogcategory.update') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $blogcategory->id }}">

                                    <div class="form-group">
                                        <h5>{{ trans('admin.blog-category-en') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name" class="form-control"
                                                value="{{ $blogcategory->blog_category_name }}">
                                            @error('blog_category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin.update') }}">
                                    </div>
                                </form>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
