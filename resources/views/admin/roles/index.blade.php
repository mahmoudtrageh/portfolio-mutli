@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content" id='app'>
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">الصلاحيات <span class="badge badge-pill badge-danger">
                                    {{ count($roles) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>الدور</th>
                                            <th>الصلاحية</th>
                                            <th>{{ trans('admin.process') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                        <button class="btn btn-warning" role="button"><i class="fas fa-shield-alt"></i>{{$permission->name}}</button>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-info"
                                                        title="{{ trans('admin.edit') }}"><i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('role.destroy', $role->id) }}" class="btn btn-danger"
                                                        title="{{ trans('admin.delete') }}" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>لا يوجد نتائج</tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add Category Page -------- -->


                <div class="col-lg-6 col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('admin.add-category') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <role></role>
                              
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

    <script src="{{mix('js/app.js')}}"></script>

@endsection
