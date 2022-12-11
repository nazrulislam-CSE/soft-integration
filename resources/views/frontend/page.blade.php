@extends('layouts.frontend')
@section('content')
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title"> {{ $page->name_en ?? 'NULL' }}</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>

<!-- Blog area start -->
<div class="postbox__area pt-120 pb-120">
 <div class="container">
    <div class="row">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-12">
           <div class="postbox__wrapper">
                <article class="postbox__item format-image transition-3">
                    <div class="postbox__content">
                       <p><img class="w-100" src="{{ asset('frontend/assets/img/blog-details/blog-big-1.jpg') }}" alt=""></p>
                       <h3 class="postbox__title">
                            {{ $page->title_en ?? 'NULL' }}
                       </h3>
                       <div class="postbox__text">
                          <p>{{ $page->description_en ?? 'NULL' }}</p>
                       </div>
                    </div>
                </article>
            </div>
       </div>
       <div class="col-xxl-4 col-xl-4 col-lg-4">
          <div class="sidebar__wrapper shadow">
            <div class="sidebar__widget mb-40">
                <h3 class="sidebar__widget-title">Pages</h3>
                <div class="sidebar__widget-content">
                   <ul>
                        @foreach(get_pages_both_footer() as $page)
                        <li>
                            <a href="{{ route('page.all', $page->slug) }}">{{ $page->name_en ?? 'NULL' }} <span><i class="fal fa-angle-right"></i></span></a>
                        </li>
                        @endforeach
                   </ul>
                </div>
            </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!-- Blog area end -->

<!-- Start Contact  Area -->
@include('frontend.common.contact')
<!-- End Contact  Area -->
@endsection