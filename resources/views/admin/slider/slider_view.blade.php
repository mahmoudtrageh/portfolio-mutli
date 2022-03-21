@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/dashboard.sliders') }}
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
                            <h3 class="box-title">{{ trans('admin/dashboard.sliders') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.image') }} </th>
                                            <th>{{ trans('admin/dashboard.title') }}</th>
                                            <th>{{ trans('admin/dashboard.description') }}</th>
                                            <th>{{ trans('admin/dashboard.status') }}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $item)
                                            <tr>

                                                <td><img src="{{ asset($item->slider_img) }}"
                                                        style="width: 70px; height: 40px;"> </td>
                                                <td>
                                                    @if ($item->title == null)
                                                        <span class="badge badge-pill badge-danger">
                                                            {{ trans('admin.no-title') }} </span>
                                                    @else
                                                        {{ $item->title }}
                                                    @endif
                                                </td>

                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">
                                                            {{ trans('admin/dashboard.active') }} </span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">
                                                            {{ trans('admin/dashboard.not-active') }} </span>
                                                    @endif

                                                </td>

                                                <td width="30%">
                                                    <a href="{{ route('slider.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('slider.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="{{ trans('admin/dashboard.delete') }}"
                                                        id="delete">
                                                        <i class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)
                                                        <a href="{{ route('slider.inactive', $item->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            title="{{ trans('admin/dashboard.not-active') }}"><i
                                                                class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('slider.active', $item->id) }}"
                                                            class="btn btn-success btn-sm"
                                                            title="{{ trans('admin/dashboard.active') }}"><i
                                                                class="fa fa-arrow-up"></i> </a>
                                                    @endif

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
                            <h3 class="box-title">{{ trans('admin/dashboard.add-slider') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
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
                                            <input type="text" name="description" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>{{ trans('admin/dashboard.image') }} <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control">
                                            @error('slider_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
