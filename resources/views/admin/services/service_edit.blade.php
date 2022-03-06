@extends('admin.admin_master')
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
                            <h3 class="box-title">{{ trans('admin.edit-slider') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('update.service',$services->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $services->id }}">

                                    <div class="form-group">
                                        <h5>{{ trans('admin.slider-title') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $services->title }}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{ trans('admin.slider-description') }} <span class="text-danger">*</span>
                                        </h5>
                                        <div class="controls">
                                            <textarea type="text" name="desc" class="form-control"
                                                value="{{ $services->desc }}">{{ $services->desc }}</textarea>
                                        </div>
                                    </div>



									<div class="form-group">
                                        <h5>{{ trans('admin.slider-title') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="icon" class="form-control"
                                                value="{{ $services->icon }}">
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
