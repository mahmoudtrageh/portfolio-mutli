@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-post') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Add Coupon Page -------- -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.edit-post') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('post-update', $post->id) }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <!-- start 2nd row  -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.title') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title" value="{{ $post->post_title }}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 2nd row  -->

                                        <div class="row">
                                            <!-- start 6th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/sidebar.category') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="{{ $post->category->id }}" selected="" >
                                                                {{ $post->category->blog_category_name }}</option>
                                                            @foreach ($blogcategory as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->blog_category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.image') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control"
                                                            onChange="mainThamUrl(this)">
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 6th row  -->

                                        <div class="row">
                                            <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin/dashboard.post-details') }} <span
                                                            class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="post_details" rows="10" cols="80">
                                {{ $post->post_details }}
                            </textarea>
                                                        @error('post_details')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 8th row  -->

                                        <hr>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="{{ trans('admin/dashboard.update') }}">
                                        </div>
                            </form>

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
