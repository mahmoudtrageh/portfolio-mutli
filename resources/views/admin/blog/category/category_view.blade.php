@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.blog-categories') }}
@endsection
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
                            <h3 class="box-title">{{trans('admin/sidebar.blog-categories')}} <span
                                    class="badge badge-pill badge-danger"> {{ count($blogcategory) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{trans('admin/sidebar.category')}}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogcategory as $item)
                                            <tr>

                                                <td>{{ $item->blog_category_name }}</td>
                                                <td>
                                                    <a href="{{ route('blog.category.edit', $item->id) }}"
                                                        class="btn btn-info" title="{{trans('admin/dashboard.edit')}}"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('blogcategory.delete', $item->id) }}"
                                                        class="btn btn-danger" title="{{trans('admin/dashboard.delete')}}"
                                                        id="delete">
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

                <!--   ------------ Add Blog Category Page -------- -->
                <div class="col-lg-6 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{trans('admin/dashboard.add-category')}} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('blogcategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{trans('admin/sidebar.category')}} <span class="text-danger">*</span>
                                        </h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name" class="form-control">
                                            @error('blog_category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{trans('admin/dashboard.add')}}">
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
