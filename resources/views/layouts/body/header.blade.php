<style>
    li {
        list-style: none;
    }

</style>
<!-- Header
  ============================================= -->
<header id="header" data-sticky-shrink="false" class="header-size-md border-bottom-0">
    <div id="header-wrap">
        <div class="header-row justify-content-between">

            <!-- Logo
            ============================================= -->
            <div id="logo" class="mr-2 ml-auto my-4">
                @php
                    $settings = DB::table('settings')->first();
                @endphp
                <a href="{{ url('/') }}" class=""><img width="120" height="100"
                        src="{{ asset($settings->logo) }}" alt=""></a>
            </div><!-- #logo end -->

            <div id="primary-menu-trigger">
                <svg class="svg-trigger" viewBox="0 0 100 100">
                    <path
                        d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                    </path>
                    <path d="m 30,50 h 40"></path>
                    <path
                        d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                    </path>
                </svg>
            </div>

            <!-- Primary Navigation
            ============================================= -->
            <nav class="primary-menu flex-lg-grow-1">

                <ul class="menu-container justify-content-lg-center">
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('home') }}">
                            <div>الرئيسية</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('blog.view') }}">
                            <div>المدونة</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ route('shop.view') }}">
                            <div>المتجر</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="#content">
                            <div>خدماتي</div>
                        </a>
                    </li>
                    <li class="menu-item mega-menu">
                        <a class="menu-link" href="#portfolio">
                            <div>أعمالي</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item">
									<a class="menu-link" href="shop.html"><div>عملائي</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="shop.html"><div>4 Columns</div></a>
										</li>
									</ul>
								</li> --}}
                    <li class="menu-item mega-menu">
                        <a class="menu-link" href="#testmonials">
                            <div>عملائي</div>
                        </a>
                    </li>
                    <li class="menu-item mega-menu">
                        <a class="menu-link" href="#contact">
                            <div>اتصل بي</div>
                        </a>
                    </li>

                </ul>

                <!-- Top Cart
                ============================================= -->

            </nav><!-- #primary-menu end -->

            <!-- Top Login
       ============================================= -->
            
                <div id="top-account" class="px-4">

                    @auth
                        <nav class="primary-menu flex-lg-grow-1">
                            <ul class="menu-container justify-content-lg-center">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{route('profile.view',Auth::guard('web')->user()->id)}}">{{ Auth::guard('web')->user()->first_name }}
                                        {{ Auth::guard('web')->user()->last_name }}
                                        <i style="top:2px;" class="fa-solid fa-user"></i></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('mycart') }}">
                                                <div>سلة التسوق</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('wishlist') }}">
                                                <div>قائمة المفضلات</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ route('logout') }}">
                                                <div>تسجيل الخروج</div>
                                            </a>
                                        </li>
                                    </ul>

                                </li>

                            </ul>
                        </nav>
                    @else
                        <a href="#modal-login" data-lightbox="inline">تسجيل الدخول / التسجيل</a>
                    @endauth

                </div><!-- #top-search end -->

                <div id="top-cart" class="header-misc-icon d-sm-block position-relative mr-auto ml-4">
                    <a href="#" id="top-cart-trigger"><i class="fa-solid fa-basket-shopping"></i><span
                        class="top-cart-number" id="cartQty"></span></a>
                    <div class="top-cart-content">
                        <div class="top-cart-title">
                            <h4>سلة التسوق</h4>
                        </div>
                        <div class="top-cart-items">
                            <div class="top-cart-item">
                               
                                <!--   // Mini Cart Start with Ajax -->

                                <li id="miniCart">

                                </li>

                                <!--   // End Mini Cart Start with Ajax -->

                            </div>
                        </div>
                        <div class="top-cart-action">
                            <span class="top-checkout-price" id="cartSubTotal"></span>
                            <a href="{{route('mycart')}}" class="button button-3d button-small m-0">أظهر السلة</a>
                        </div>
                    </div>
                </div><!-- #top-cart end -->
                
                <!-- Login/Register Modal -->
                <div class="modal-register mfp-hide" id="modal-login">
                    <div class="card mx-auto" style="max-width: 540px;">
                        <div class="card-header py-3 bg-transparent center">
                            <h3 class="mb-0 font-weight-normal">أهلا بعودتك</h3>
                        </div>
                        <div class="card-body mx-auto py-5" style="max-width: 70%;">

                            <a href="#"
                                class="button button-large btn-block si-colored si-facebook nott font-weight-normal ls0 center m-0"><i
                                    class="icon-facebook-sign"></i> تسجيل الدخول بالفيس بوك</a>

                            <div class="divider divider-center"><span class="position-relative"
                                    style="top: -2px">أو</span>
                            </div>

                            <form id="login-form" name="login-form" class="mb-0 row"
                                action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="col-12">
                                    <input type="text" id="login-form-username" name="email" value=""
                                        class="form-control not-dark" placeholder="البريد الإلكتروني" />
                                </div>

                                <div class="col-12 mt-4">
                                    <input type="password" id="login-form-password" name="password" value=""
                                        class="form-control not-dark" placeholder="كلمة المرور" />
                                </div>

                                <div class="col-12 text-right mt-3">
                                    <a href="{{ route('password.request') }}" class="text-dark font-weight-light mt-2">نسيت كلمة المرور؟</a>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="button btn-block m-0">تسجيل الدخول</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-4 center">
                            <p class="mb-0">ليس لديك حساب؟ <a href="#modal-register"
                                    data-lightbox="inline"><u>تسجيل</u></a></p>
                        </div>
                    </div>
                </div>

                <div class="modal-register mfp-hide" id="modal-register">
                    <div class="card mx-auto" style="max-width: 540px;">
                        <div class="card-header py-3 bg-transparent center">
                            <h3 class="mb-0 font-weight-normal">تسجيل حساب</h3>
                        </div>
                        <div class="card-body mx-auto py-5" style="max-width: 70%;">


                            <form id="login-form" name="login-form" class="mb-0 row"
                                action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="col-12 text-right">
                                    <label class="info-title"
                                        for="exampleInputEmail1">{{ trans('admin.first_name') }}
                                        <span>*</span></label>
                                    <input type="text" id="first_name" name="first_name"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 text-right">
                                    <label class="info-title pt-3"
                                        for="exampleInputEmail1">{{ trans('admin.last_name') }}
                                        <span>*</span></label>
                                    <input type="text" id="last_name" name="last_name"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 text-right">
                                    <label class="info-title pt-3" for="exampleInputEmail2">{{ trans('admin.email') }}
                                        <span>*</span></label>
                                    <input type="email" id="email" name="email"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 text-right">
                                    <label class="info-title pt-3" for="exampleInputEmail1">{{ trans('admin.phone') }}
                                        <span>*</span></label>
                                    <input type="text" id="phone" name="phone"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 text-right">
                                    <label class="info-title pt-3"
                                        for="exampleInputEmail1">{{ trans('admin.password') }}
                                        <span>*</span></label>
                                    <input type="password" id="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 text-right">
                                    <label class="info-title pt-3"
                                        for="exampleInputEmail1">{{ trans('admin.confirm-password') }}
                                        <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="button btn-block m-0">تسجيل</button>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer py-4 center">
                            <p class="mb-0">لديك حساب؟ <a href="#modal-login" data-lightbox="inline"><u>تسجيل
                                        الدخول</u></a></p>
                        </div>
                    </div>
                </div>

        </div>

    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
