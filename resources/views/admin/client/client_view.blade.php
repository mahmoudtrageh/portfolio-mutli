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
                            <h3 class="box-title">العملاء <span class="badge badge-pill badge-danger">
                                    {{ count($clients) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin.brand-en') }} </th>
                                            <th>{{ trans('admin.brand-ar') }}</th>
                                            <th>{{ trans('admin.image') }}</th>
                                            <th>{{ trans('admin.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td><img src="{{ asset($item->image) }}"
                                                        style="width: 70px; height: 40px;"> </td>
                                                <td>
                                                    <a href="{{ route('client.edit', $item->id) }}" class="btn btn-info"
                                                        title="{{ trans('admin.edit') }}"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('client.delete', $item->id) }}"
                                                        class="btn btn-danger" title="{{ trans('admin.delete') }}"
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


                <!--   ------------ Add Brand Page -------- -->


                <div class="col-lg-6 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.add-brand') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <h5>{{ trans('admin.brand-name-en') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>{{ trans('admin.brand-image') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

									<div class="form-group">
                                        <h5>{{ trans('admin.brand-name-en') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="url" class="form-control">
                                            @error('url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
