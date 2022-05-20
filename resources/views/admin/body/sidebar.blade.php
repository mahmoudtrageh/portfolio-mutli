@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <a href="{{ url('admin/dashboard') }}">
                <!-- logo for regular state and mobile devices -->
                <div class="d-flex align-items-center justify-content-center">
                    @php
                        $settings = DB::table('settings')->first();
                    @endphp
                    <img width="100" src="{{ asset($settings->logo) }}" alt="">
                </div>
            </a>
        </div>
        
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="ti-view-grid"></i>
                    <span>{{ trans('admin/sidebar.dashboard') }}</span>
                </a>
            </li>

            <li class="header nav-small-cap">{{ trans('admin/sidebar.general-settings') }}</li>

            <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-settings"></i>
                    <span>{{ trans('admin/sidebar.settings-management') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                            href="{{ route('site.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.site-settings') }}</a></li>
                   
                    <li class="{{ $route == 'all.lang' ? 'active' : '' }}"><a
                            href="{{ route('all.lang') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.lang-settings') }}</a></li>
                  
                    <li class="treeview {{ $prefix == '/menu' ? 'active' : '' }}  ">
                        <a href="#">
                            <i class="ti-view-list-alt"></i> <span>{{ trans('admin/sidebar.menu-settings') }} </span>
                            <span class="pull-left-container">
                                <i class="fa fa-angle-left pull-left"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ $route == 'all.menu' ? 'active' : '' }}"><a
                                    href="{{ route('all.menu') }}"><i
                                        class="ti-more"></i>{{ trans('admin/sidebar.menu') }}</a></li>
                            <li class="{{ $route == 'all.submenu' ? 'active' : '' }}"><a
                                    href="{{ route('all.submenu') }}"><i
                                        class="ti-more"></i>{{ trans('admin/sidebar.submenu') }}</a></li>
        
                        </ul>
                    </li>

                </ul>
            </li>


            <li class="{{ $route == 'admin.message' ? 'active' : '' }}"><a href="{{ route('admin.message') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.messages') }}</a></li>

                        <li class="{{ $route == 'admin.printing' ? 'active' : '' }}"><a href="{{ route('admin.printing') }}"><i
                        class="ti-more"></i>طلبات الطباعة</a></li>


            
          

                    <li class="{{ $route == 'manage-slider' ? 'active' : '' }}"><a
                            href="{{ route('manage-slider') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.slider-management') }}</a></li>

                    <li class="{{ $route == 'edit.about' ? 'active' : '' }}"><a
                            href="{{ route('edit.about') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.about-site') }}</a></li>

                    <li class="{{ $route == 'all.service' ? 'active' : '' }}"><a
                            href="{{ route('all.service') }}"><i class="ti-more"></i>{{ trans('admin/sidebar.services') }}</a></li>

  
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                            href="{{ route('all.category') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.all-categories') }}</a></li>

                                <li class="{{ $route == 'manage-details' ? 'active' : '' }}"><a
                            href="{{ route('manage-details') }}"><i
                                class="ti-more"></i>إدارة التفاصيل</a></li>
                   

            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}  ">
                <a href="#">
                    <i class="ti-shopping-cart-full"></i>
                    <span>{{ trans('admin/sidebar.products') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                            href="{{ route('add-product') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.add-products') }}</a></li>

                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                            href="{{ route('manage-product') }}"><i
                                class="ti-more"></i>{{ trans('admin/sidebar.products-management') }}</a></li>

                </ul>
            </li>

           

  
          
            <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                    href="{{ route('product.stock') }}"><i
                        class="ti-more"></i>{{ trans('admin/sidebar.products-stock') }}</a></li>
           

        </ul>
    </section>

</aside>
