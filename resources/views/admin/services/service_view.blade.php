@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.services') }}
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
                            <h3 class="box-title">{{ trans('admin/sidebar.services') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.title') }} </th>
                                            <th>{{ trans('admin/dashboard.icon') }}</th>
                                            <th>{{ trans('admin/dashboard.description') }}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $item)
                                            <tr>

                                                <td>{{ $item->title }}</td>

                                                <td><i class="{{ $item->icon }}"></i></td>

                                                <td>{{ $item->desc }}</td>

                                                <td width="30%">
                                                    <a href="{{ route('edit.service', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('delete.service', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="{{ trans('admin/dashboard.delete') }}"
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
                            <h3 class="box-title">{{ trans('admin/dashboard.add-service') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('store.service') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.title') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.description') }} <span class="text-danger">*</span>
                                        </h5>
                                        <div class="controls">
                                            <textarea type="text" name="desc" class="form-control"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.icon') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="icon" class="form-control">
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="{{ trans('admin/dashboard.add') }}">
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
