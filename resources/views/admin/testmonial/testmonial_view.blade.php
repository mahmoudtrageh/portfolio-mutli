@extends('admin.admin_master')
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
                            <h3 class="box-title">الخدمات</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">المستخدم</th>
                                            <th scope="col">الوظيفة</th>
                                            <th scope="col">النص</th>
                                            <th scope="col">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testmonials as $item)
                                            <tr>

                                                <td>{{ $item->user }} </td>
                                                <td> {{ $item->job }} </td>
                                                <td> {{ $item->text }} </td>

                                                <td width="30%">
                                                    <a href="{{ route('edit.testmonial', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="{{ trans('admin.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('delete.testmonial', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="{{ trans('admin.delete') }}"
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


                <!--   ------------ Add Slider Page -------- -->


                <div class="col-lg-6 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.add-slider') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('store.testmonial') }}"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">المستخدم</label>
                                        <input type="text" name="user" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">

                                        @error('user')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الوظيفة</label>
                                        <input type="text" name="job" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">

                                        @error('job')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">النص</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            name="text">

                                        </textarea>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin.add') }}">
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
