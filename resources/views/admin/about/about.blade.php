@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{ trans('admin.site-setting-page') }} </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeabout->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>{{ trans('admin.title') }} <span
                                                            class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $homeabout->title }}">
                                                    </div>
                                                </div>

                                               
                                                <div class="form-group">
                                                    <h5>{{trans('admin.slider-description')}} <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                 <input type="text" name="short_dis" class="form-control" value="{{ $homeabout->short_dis }}" >
                                                 
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>{{trans('admin.slider-description')}} <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                 <input type="text" name="long_dis" class="form-control" value="{{ $homeabout->long_dis }}" >
                                                 
                                                  </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div> <!-- end row 	 -->




                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                value="{{ trans('admin.update') }}">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>



    </div>
@endsection
