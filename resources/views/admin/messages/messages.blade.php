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
                            <h3 class="box-title">الرسائل <span class="badge badge-pill badge-danger">
                                    {{ count($messages) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="15%">الإسم </th>
                                            <th scope="col" width="25%">البريد الإلكتروني</th>
                                            <th scope="col" width="15%">الموضوع</th>
                                            <th scope="col" width="15%">الرسالة</th>
                                            <th scope="col" width="15%">الإجراء</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $mess)
                                            <tr>
                                                <td> {{ $mess->name }} </td>
                                                <td> {{ $mess->email }} </td>
                                                <td> {{ $mess->subject }} </td>
                                                <td> {{ $mess->message }} </td>
                                                <td>
                                                    <a href="{{ url('message/delete/' . $mess->id) }}"
                                                        onclick="return confirm('هل أنت متأكد من الحذف')"
                                                        class="btn btn-danger">حذف</a>
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
