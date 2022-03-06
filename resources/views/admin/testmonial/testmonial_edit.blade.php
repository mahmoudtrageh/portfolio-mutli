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


                                <form method="post" action="{{ route('update.testmonial',$testmonial->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $testmonial->id }}">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تعديل المستخدم</label>
                                        <input type="text" name="user" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $testmonials->user }}">

                                        @error('user')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">تعديل الوظيفة</label>
                                        <input type="text" name="job" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $testmonials->job }}">

                                        @error('job')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">النص</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="text">
                                        {{ $testmonials->text }}
                                        </textarea>
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
