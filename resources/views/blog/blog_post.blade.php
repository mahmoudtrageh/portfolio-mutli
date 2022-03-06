@extends('layouts.master_home')

@section('home_content')
    <!-- Page Title
          ============================================= -->
    <section id="page-title" style="background-color: #752651;">

        <div class="container clearfix">
            <h1 class="text-white">المدونة</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">المدونة</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
      ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
          ============================================= -->
                    <div class="postcontent col-lg-12">

                        <div class="single-post mb-0">

                            <!-- Single Post
            ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Title
             ============================================= -->
                                <div class="entry-title">
                                    <h2>{{$post->post_title}}</h2>
                                </div><!-- .entry-title end -->

                                <!-- Entry Meta
             ============================================= -->
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="icon-calendar3"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</li>
                                        <li><i class="icon-folder-open"></i> <span>{{$post->category->blog_category_name}}</span>
                                        </li>
                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                                    </ul>
                                </div><!-- .entry-meta end -->

                                <!-- Entry Image
             ============================================= -->
                                <div class="entry-image">
                                    <a href="#"><img src="{{asset($post->post_image)}}" alt="Blog Single"></a>
                                </div><!-- .entry-image end -->

                                <!-- Entry Content
             ============================================= -->
                                <div class="entry-content mt-0">

                                    {!!$post->post_details!!}

                                    <div class="clear"></div>

                                    <!-- Post Single - Share
              ============================================= -->
                                    <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                        <span>شارك المقالة:</span>
                                        <div class="addthis_inline_share_toolbox_8tvu"></div>
                                    </div><!-- Post Single - Share End -->

                                </div>
                            </div><!-- .entry end -->

                            <h4>مقالات ذات صلة:</h4>

                            <div class="related-posts row posts-md col-mb-30">

                                @foreach($related_posts as $related_post)

                                <div class="entry col-12 col-md-6">
                                    <div class="grid-inner row align-items-center gutter-20">
                                        <div class="col-4">
                                            <div class="entry-image">
                                                <a href="{{route('blog.post',$related_post->id)}}"><img src="{{asset($related_post->post_image)}}" alt="Blog Single"></a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="entry-title title-xs">
                                                <h3><a href="{{route('blog.post',$related_post->id)}}">{{$related_post->post_title}}</a></h3>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li><i class="icon-calendar3"></i> {{ \Carbon\Carbon::parse($related_post->created_at)->format('d/m/Y')}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>                           

                        </div>

                    </div><!-- .postcontent end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->

@endsection

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>
