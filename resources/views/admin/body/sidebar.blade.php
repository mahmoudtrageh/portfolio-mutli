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
                    <i data-feather="pie-chart"></i>
                    <span>{{ trans('admin.dashboard') }}</span>
                </a>
            </li>

            <li class="header nav-small-cap">اعدادات عامة</li>

            <li class="treeview {{ $prefix == '/setting' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>{{ trans('admin.manage-settings') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'site.setting' ? 'active' : '' }}"><a
                            href="{{ route('site.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin.site-settings') }}</a></li>

                    <li class="{{ $route == 'seo.setting' ? 'active' : '' }}"><a
                            href="{{ route('seo.setting') }}"><i
                                class="ti-more"></i>{{ trans('admin.seo-settings') }}</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>الأعضاء</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء مدير'))
                        <li class="{{ $route == 'all.admin.user' ? 'active' : '' }}"><a
                                href="{{ route('all.admin.user') }}"><i
                                    class="ti-more"></i>{{ trans('admin.all-admin') }} </a></li>
                    @endif
                    <li class="{{ $route == 'all-users' ? 'active' : '' }}"><a href="{{ route('all-users') }}"><i
                                class="ti-more"></i>{{ trans('admin.all-users') }}</a></li>

                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء صلاحية'))
                        <li class="{{ $route == 'permission.index' ? 'active' : '' }}"><a
                                href="{{ route('permission.index') }}"><i class="ti-more"></i>الصلاحيات</a>
                        </li>
                    @endif
                    @if (auth('admin')->check() &&
    auth('admin')->user()->can('إنشاء دور'))
                        <li class="{{ $route == 'role.index' ? 'active' : '' }}"><a
                                href="{{ route('role.index') }}"><i class="ti-more"></i>الأدوار</a></li>
                    @endif

                </ul>

            </li>

            <li class="{{ $route == 'admin.message' ? 'active' : '' }}"><a href="{{ route('admin.message') }}"><i
                        class="ti-more"></i>الرسائل</a></li>

            <li class="header nav-small-cap">الموقع الشخصي</li>

            <li class="treeview {{ $prefix == '/blog' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>{{ trans('admin.manage-blog') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'blog.category' ? 'active' : '' }}"><a
                            href="{{ route('blog.category') }}"><i
                                class="ti-more"></i>{{ trans('admin.blog-category') }}</a></li>

                    <li class="{{ $route == 'list.post' ? 'active' : '' }}"><a href="{{ route('list.post') }}"><i
                                class="ti-more"></i>{{ trans('admin.list-blog-post') }}</a></li>

                    <li class="{{ $route == 'add.post' ? 'active' : '' }}"><a href="{{ route('add.post') }}"><i
                                class="ti-more"></i>{{ trans('admin.add-post') }}</a></li>

                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>إدارة الموقع الشخصي</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $route == 'manage-slider' ? 'active' : '' }}"><a
                            href="{{ route('manage-slider') }}"><i
                                class="ti-more"></i>{{ trans('admin.manage-slider') }}</a></li>

                    <li class="{{ $route == 'edit.about' ? 'active' : '' }}"><a
                            href="{{ route('edit.about') }}"><i class="ti-more"></i>عن الموقع</a></li>

                    <li class="{{ $route == 'all.portfolio' ? 'active' : '' }}"><a
                            href="{{ route('all.portfolio') }}"><i class="ti-more"></i>معرض الأعمال</a></li>

                    <li class="{{ $route == 'all.service' ? 'active' : '' }}"><a
                            href="{{ route('all.service') }}"><i class="ti-more"></i>الخدمات</a></li>

                    <li class="{{ $route == 'all.testmonial' ? 'active' : '' }}"><a
                            href="{{ route('all.testmonial') }}"><i class="ti-more"></i>أراء العملاء</a></li>

                    <li class="{{ $route == 'all.client' ? 'active' : '' }}"><a
                            href="{{ route('all.client') }}"><i class="ti-more"></i>العملاء</a></li>

                </ul>
            </li>

            <li class="header nav-small-cap">المتجر</li>

            <li class="{{ $route == 'all.brand' ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i
                        class="ti-more"></i>البراندات</a></li>

            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="mail"></i> <span>{{ trans('admin.category') }} </span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a
                            href="{{ route('all.category') }}"><i
                                class="ti-more"></i>{{ trans('admin.all-category') }}</a></li>
                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a
                            href="{{ route('all.subcategory') }}"><i
                                class="ti-more"></i>{{ trans('admin.all-sub-category') }}</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>{{ trans('admin.products') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add-product' ? 'active' : '' }}"><a
                            href="{{ route('add-product') }}"><i
                                class="ti-more"></i>{{ trans('admin.add-products') }}</a></li>

                    <li class="{{ $route == 'manage-product' ? 'active' : '' }}"><a
                            href="{{ route('manage-product') }}"><i
                                class="ti-more"></i>{{ trans('admin.manage-products') }}</a></li>

                </ul>
            </li>

            <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a href="{{ route('manage-coupon') }}"><i
                        class="ti-more"></i>{{ trans('admin.manage-coupons') }}</a></li>

            <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a
                    href="{{ route('manage-division') }}"><i class="ti-more"></i>الشحن</a></li>

            <li class="treeview {{ $prefix == '/return' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>{{ trans('admin.return-order') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'return.request' ? 'active' : '' }}"><a
                            href="{{ route('return.request') }}"><i
                                class="ti-more"></i>{{ trans('admin.return-order') }}</a></li>

                    <li class="{{ $route == 'all.request' ? 'active' : '' }}"><a
                            href="{{ route('all.request') }}"><i
                                class="ti-more"></i>{{ trans('admin.all-request') }}</a></li>


                </ul>
            </li>

            <li class="treeview {{ $prefix == '/orders' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    @php
                        $pending_orders = DB::table('orders')
                            ->where('status', 'pending')
                            ->get();
                        
                    @endphp
                    <span>{{ trans('admin.orders') }} <span class="badge badge-pill badge-danger">
                            {{ count($pending_orders) }} </span></span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending-orders' ? 'active' : '' }}"><a
                            href="{{ route('pending-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin.pending-orders') }} <span
                                class="badge badge-pill badge-danger"> {{ count($pending_orders) }} </span></a></li>

                    <li class="{{ $route == 'confirmed-orders' ? 'active' : '' }}"><a
                            href="{{ route('confirmed-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin.confirmed-orders') }}</a></li>

                    <li class="{{ $route == 'processing-orders' ? 'active' : '' }}"><a
                            href="{{ route('processing-orders') }}"><i
                                class="ti-more"></i>{{ trans('admin.processing-orders') }}</a></li>

                    <li class="{{ $route == 'picked-orders' ? 'active' : '' }}"><a
                            href="{{ route('picked-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin.picked-orders') }}</a></li>

                    <li class="{{ $route == 'shipped-orders' ? 'active' : '' }}"><a
                            href="{{ route('shipped-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin.shipped-orders') }}</a></li>

                    <li class="{{ $route == 'delivered-orders' ? 'active' : '' }}"><a
                            href="{{ route('delivered-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin.delivered-orders') }}</a></li>

                    <li class="{{ $route == 'cancel-orders' ? 'active' : '' }}"><a
                            href="{{ route('cancel-orders') }}"><i class="ti-more"></i>
                            {{ trans('admin.cancel-orders') }}</a></li>



                </ul>
            </li>

            <li class="treeview {{ $prefix == '/review' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>{{ trans('admin.manage-review') }}</span>
                    <span class="pull-left-container">
                        <i class="fa fa-angle-left pull-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'pending.review' ? 'active' : '' }}"><a
                            href="{{ route('pending.review') }}"><i
                                class="ti-more"></i>{{ trans('admin.pending-review') }}</a></li>

                    <li class="{{ $route == 'publish.review' ? 'active' : '' }}"><a
                            href="{{ route('publish.review') }}"><i
                                class="ti-more"></i>{{ trans('admin.publish-review') }}</a></li>


                </ul>
            </li>

            <li class="{{ $route == 'product.stock' ? 'active' : '' }}"><a
                    href="{{ route('product.stock') }}"><i
                        class="ti-more"></i>{{ trans('admin.product-stock') }}</a></li>

            <li class="{{ $route == 'all-reports' ? 'active' : '' }}"><a href="{{ route('all-reports') }}"><i
                        class="ti-more"></i>{{ trans('admin.all-reports') }}</a></li>

        </ul>
    </section>

</aside>
