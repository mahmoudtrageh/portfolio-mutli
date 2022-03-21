@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-portfolio') }}
@endsection
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--   ------------ Edit Slider Page -------- -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin/dashboard.edit-portfolio') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('update.portfolio', $portfolio->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $portfolio->id }}">

                                    <input type="hidden" name="old_image" value="{{ $portfolio->img }}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.name') }}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $portfolio->name }}">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.image') }}</label>
                                        <input type="file" name="img" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $portfolio->img }}">

                                        @error('img')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($portfolio->img) }}" style="width:400px; height:200px;">

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.url') }}</label>
                                        <input type="text" name="url" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $portfolio->url }}">

                                        @error('url')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.tag') }}</label>
                                        <input type="text" name="tag" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $portfolio->tag }}">

                                        @error('tag')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.update') }}">
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
