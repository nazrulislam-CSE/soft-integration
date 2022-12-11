@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Blog Details</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- blog-area-start -->
<div class="tp-blog-area pt-130 pb-130">
  <div class="container">
     <div class="row">
        @foreach($blogs as $blog)
        <div class="tp-testimonial-section-box text-center pb-35">
           <h5 class="tp-subtitle">{{ $blog->name_en ?? 'NULL' }}</h5>
           <h2 class="tp-title">{{ $blog->title_en ?? 'NULL' }}</h2>
        </div>
        @endforeach
     </div>
     @php
        $blogs = App\Models\Blog::where('status', 1)->latest()->get();
     @endphp
     <div class="row gx-6">
        @foreach($blogs as $blog)
        <div class="col-xl-4 col-md-6 tp-blog-border wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
           <div class="tp-blog-item-three">
              <div class="tp-blog-item-three__img fix">
                 <a href="{{ url('single-blog/'.$blog->id) }}"><img class="w-100" src="{{ asset($blog->blog_image )}}" alt=""></a>
              </div>
              <div class="tp-blog-item-three__content">
                 <div class="tp-blog-item-three__meta pt-25 pb-15">
                    <a href="{{ url('single-blog/'.$blog->id) }}">{{ $blog->blog_name_en ?? 'NULL' }}</a>
                    <a class="tp-meta-text" href="blog-details.html"><i class="fal fa-calendar-alt"></i> {{ $blog->blog_date ?? 'Null'}}</a>
                 </div>
                 <div class="tp-blog-item-three__title">
                    <h4 class="tp-bp-title"><a href="{{ url('single-blog/'.$blog->id) }}">{{ $blog->blog_name_en ?? 'NULL' }}</a></h4>
                    <p>
                       <?php $des =  strip_tags       (html_entity_decode($blog->blog_description_en))?>
                       {{ Str::limit($des, $limit = 50, $end = '. . .') }}
                    </p>
                 </div>
                 <div class="tp-blog-item-three__button">
                    <a class="tp-btn-grey-sm" href="{{ url('single-blog/'.$blog->id) }}">{{ $blog->button_name_en ?? 'NULL' }}</a>
                 </div>
              </div>
           </div>
        </div>
        @endforeach
     </div>
  </div>
</div>
<!-- blog-area-end -->
<!-- Contact  Area -->
@include('frontend.common.contact')
<!-- Contact  Area -->
@endsection