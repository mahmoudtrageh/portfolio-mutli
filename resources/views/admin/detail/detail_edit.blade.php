@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.edit-slider') }}
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
                            <h3 class="box-title">{{ trans('admin/dashboard.edit-slider') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('detail.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $details->id }}">
                                    <input type="hidden" name="old_image" value="{{ $details->img }}">

                                    <div class="form-group">
                                        <h5>color<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="color" class="form-control"
                                                value="{{ $details->color }}">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>material <span class="text-danger">*</span>
                                        </h5>
                                        <div class="controls">
                                            <input type="text" name="material" class="form-control"
                                                value="{{ $sliders->matrial }}">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="img" class="form-control">
                                            @error('img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
