@extends('admin.admin_master')
@section('admin')
    <style>
        .add-admin {
            float: left;
        }

    </style>


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.admins-list') }} </h3>
                            <a href="{{ route('add.admin') }}"
                                class="btn btn-danger add-admin">{{ trans('admin.add-admin') }}</a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('admin.image') }} </th>
                                            <th>{{ trans('admin.name') }} </th>
                                            <th>{{ trans('admin.email') }} </th>
                                            <th>{{ trans('admin.roles') }} </th>
                                            <th>{{ trans('admin.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminuser as $item)
                                            <tr>
                                                <td> <img
                                                        src="{{ !empty($item->img) ? url($item->img) : url('upload/no_image.jpg') }}"
                                                        style="width: 50px; height: 50px;"> </td>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->email }} </td>

                                                <td>
                                                    @if ($item->roles->pluck('name')[0] != null)
                                                        {{ $item->roles->pluck('name')[0] }}
                                                    @endif
                                                </td>


                                                <td width="25%">
                                                    <a href="{{ route('edit.admin.user', $item->id) }}"
                                                        class="btn btn-info" title="{{ trans('admin.edit') }}"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('delete.admin.user', $item->id) }}"
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






            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
