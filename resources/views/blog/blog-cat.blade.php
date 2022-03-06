@extends('layouts.master_home')

<style>
    .entry {
        position: unset !important;
    }

</style>

@section('home_content')
    <!-- Page Title
              ============================================= -->
    <section id="page-title" style="background-color: #752651;">

        <div class="container clearfix">
            <h1 class="text-white">المدونة</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('blog.view') }}">المدونة</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">{{$category->blog_category_name}}</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
              ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row">
                    <div class="col-md-9">
                        <!-- Posts
                            ============================================= -->
                        <div id="posts" class="post-grid row grid-container gutter-50 clearfix" data-layout="fitRows">

                            @foreach ($blogpost as $post)
                                <div class="entry col-sm-6 col-12">
                                    <div class="grid-inner">
                                        <div class="entry-image">
                                            <a href="{{ route('blog.post', $post->id) }}"><img
                                                    src="{{ asset($post->post_image) }}" alt="Standard Post with Image"></a>
                                        </div>
                                        <div class="entry-title">
                                            <h2><a
                                                    href="{{ route('blog.post', $post->id) }}">{{ $post->post_title }}</a>
                                            </h2>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><i class="icon-calendar3"></i>
                                                    {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</li>
                                                <li><i class="icon-folder-open"></i>
                                                    <span>{{ $post->category->blog_category_name }}</span>
                                            </ul>
                                        </div>
                                        <div class="entry-content">
                                            <p>{!! substr($post->post_details, 0, 100) !!}</p>
                                            <a href="{{ route('blog.post', $post->id) }}" class="more-link">اقرأ
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div><!-- #posts end -->

                        <!-- Pagination
                            ============================================= -->

                        {{ $blogpost->links() }}

                        <!-- .pager end -->
                    </div>

                    <div class="col-md-3">
                        <!-- ======== ====CATEGORY======= === -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">{{ trans('site.blog-category') }}</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    @foreach ($blogcategory as $category)
                                        <ul class="list-group">
                                            <a href="{{ url('blog/category/post/' . $category->id) }}">
                                                <li class="list-group-item">
                                                    @php $all_posts = DB::table('blog_posts')->where('category_id', $category->id)->count(); @endphp
                                                    {{ $category->blog_category_name }} ({{$all_posts}})
                                                </li>
                                            </a>

                                        </ul>
                                    @endforeach

                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ===== ======== CATEGORY : END ==== = -->
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->
@endsection
