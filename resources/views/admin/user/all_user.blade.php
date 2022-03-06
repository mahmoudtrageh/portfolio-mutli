@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <style>
        .add-admin {
            float: left;
        }

    </style>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.users') }} <span class="badge badge-pill badge-danger">
                                    {{ count($users) }} </span> </h3>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.users-list') }} </h3>
                            <a href="{{ route('add.user') }}"
                                class="btn btn-danger add-admin">{{ trans('admin.add-user') }}</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin.image') }} </th>
                                            <th>{{ trans('admin.first_name') }} </th>
                                            <th>{{ trans('admin.last_name') }} </th>
                                            <th>{{ trans('admin.email') }}</th>
                                            <th>{{ trans('admin.phone') }}</th>
                                            <th>{{ trans('admin.status') }}</th>
                                            <th>{{ trans('admin.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ !empty($user->img)? url($user->img): url('upload/no_image.jpg') }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>

                                                <td>


                                                    <span
                                                        class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>

                                                </td>

                                                <td>
                                                    <a href="{{ route('edit.admin.user.user', $user->id) }} " class="btn btn-info" title="{{ trans('admin.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('edit.admin.user.user', $user->id) }} " class="btn btn-danger" title="{{ trans('admin.delete') }}"
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
                <!-- /.end col-12 -->







            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
