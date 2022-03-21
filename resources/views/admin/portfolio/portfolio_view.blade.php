@extends('admin.admin_master')
@section('title')
    {{ trans('admin/sidebar.dashboard') }} | {{ trans('admin/sidebar.portfolio') }}
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
                            <h3 class="box-title">{{ trans('admin/sidebar.portfolio') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin/dashboard.name') }} </th>
                                            <th>{{ trans('admin/dashboard.image') }}</th>
                                            <th>{{ trans('admin/dashboard.url') }}</th>
                                            <th>{{ trans('admin/dashboard.tag') }}</th>
                                            <th>{{ trans('admin/dashboard.process') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($portfolios as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>

                                                <td><img src="{{ asset($item->img) }}" style="width: 70px; height: 40px;">
                                                </td>

                                                <td>{{ $item->url }}</td>

                                                <td>{{ $item->tag }}</td>

                                                <td width="30%">
                                                    <a href="{{ route('edit.portfolio', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="{{ trans('admin/dashboard.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('delete.portfolio', $item->id) }}"
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
                            <h3 class="box-title">{{ trans('admin/dashboard.add-portfolio') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('store.portfolio') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.name') }}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">

                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.image') }}</label>
                                        <input type="file" name="img" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>

                                        @error('img')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.url') }}</label>
                                        <input type="text" name="url" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">

                                        @error('url')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ trans('admin/dashboard.tag') }}</label>
                                        <input type="text" name="tag" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">

                                        @error('tag')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror

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
