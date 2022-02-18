<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>{{ trans('admin.login') }} </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

    <style>
        .admin-login-page .nav {
            margin-left: 20px;
        }

        .admin-login .input-group input {
            text-align: right;
        }

        .admin-login .checkbox {
            text-align: right;
        }

        .admin-login-page .nav {
            text-align: right;
            margin-right: 20px;
        }

        .admin-login-page .dropdown-menu {
            right: 0px;
            left: auto !important;
        }

    </style>
</head>

<body class="hold-transition theme-primary bg-gradient-primary">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <p class="text-white-50">{{ trans('admin.create-account') }}</p>
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
                                    <strong>{{ session::get('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show text-right" role="alert">
                                    <strong>{{ session::get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="list-unstyled">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="admin-login" method="POST" action="{{ route('admin.register.create') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="name" name="name"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="{{ trans('admin.name') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-user"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="email" id="email" name="email"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="{{ trans('admin.email') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-email"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="password" id="password" name="password"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="{{ trans('admin.password') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i
                                                    class="ti-lock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="{{ trans('admin.password-confirmation') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i
                                                    class="ti-lock"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkbox text-white">
                                    <input type="checkbox" id="basic_checkbox_1">
                                    <a href="{{ route('login_form') }}"
                                        for="basic_checkbox_1">{{ trans('admin.have-account') }}</a>
                                </div>

                                <div class="row">

                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn btn-info btn-rounded mt-10">{{ trans('admin.register') }}</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>

</body>

</html>
