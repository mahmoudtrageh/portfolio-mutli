@extends('layouts.master_home')
@section('title')
    {{ trans('site/body.store') }}
@endsection
@section('home_content')
    <!-- Page Title
                                                  ============================================= -->
    <section id="page-title" style="background-color: #752651;">

        <div class="container clearfix">
            <h1 class="text-white">كل عام وأنتم بخير</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white"
                        href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">تهنئة</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <div class="container">

        <!-- Order Traking Modal -->
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">قم بعمل تهنئة 
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form method="post" action="{{ route('write.on.image') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="name" required="" class="form-control"
                                        placeholder="اكتب اسم الشخص هنا">
                                </div>

                                <button class="btn btn-danger" type="submit" style="margin-left: 17px;">
                                    أرسل</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4 pb-5">
                <img src="{{ asset('upload/ramadan/ramadan_with_text.jpg') }}" alt="">
                <a class="btn btn-danger mt-3" href="{{route('download.image')}}">تحميل الصورة</a>
                    
            </div>
            
        </div>
        <!-- Order Traking Modal -->
    </div>
@endsection
