@extends('layouts.frontend')
@section('content')
@if($submenu_all->name_en == 'Web Development' ?? 'Null')
@php
    $services = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
@php
    $service_section = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">'Web Development</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!--case-area-start -->
<div class="sv-case-area pt-130 pb-130">
 <div class="container">
    <div class="row justify-content-center">
    @foreach($services as $service)
       <div class="col-xl-8">
          <div class="project-section-box-two text-center pb-60">
            <h2 class="tp-title">
               {{ $service->title_en ?? 'NULL' }}
            </h2>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row gx-6">
        @foreach($service_section as $service)
       <div class="col-xl-4 col-lg-4 col-md-6 col-12 wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
          <div class="svcase text-center mb-50">
             <div class="svcase__img fix">
                <img src="{{ asset($service->service_image )}}" alt="">
             </div>
             <div class="svcase__content">
                <h4 class="sv-case-sm-title">
                   <a href="{{ url('single-services/'.$service->id) }}">
                      {{ $service->service_name_en ?? 'NULL' }}
                   </a>
                </h4>
                <p>{!! $service->service_description_en ?? 'NULL' !!}u</p>
             </div>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row">
       <div class="col-12">
          <div class="case-button text-center pt-30">
            <a class="tp-btn-sky" href="{{ route('services.details') }}">View All Services</a>
          </div>
       </div>
    </div>
 </div>
</div>
<!--case-area-end -->
@endif

@if($submenu_all->name_en == 'Digital Marketing' ?? 'Null')
@php
    $services = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
@php
    $service_section = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
<!-- Start SubCategories Area -->
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Digital Marketing</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!--case-area-start -->
<div class="sv-case-area pt-130 pb-130">
 <div class="container">
    <div class="row justify-content-center">
    @foreach($services as $service)
       <div class="col-xl-8">
          <div class="project-section-box-two text-center pb-60">
            <h2 class="tp-title">
               {{ $service->title_en ?? 'NULL' }}
            </h2>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row gx-6">
        @foreach($service_section as $service)
       <div class="col-xl-4 col-lg-4 col-md-6 col-12 wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
          <div class="svcase text-center mb-50">
             <div class="svcase__img fix">
                <img src="{{ asset($service->service_image )}}" alt="">
             </div>
             <div class="svcase__content">
                <h4 class="sv-case-sm-title">
                   <a href="{{ url('single-services/'.$service->id) }}">
                      {{ $service->service_name_en ?? 'NULL' }}
                   </a>
                </h4>
                <p>{!! $service->service_description_en ?? 'NULL' !!}u</p>
             </div>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row">
       <div class="col-12">
          <div class="case-button text-center pt-30">
            <a class="tp-btn-sky" href="{{ route('services.details') }}">View All Services</a>
          </div>
       </div>
    </div>
 </div>
</div>
<!--case-area-end -->
<!-- End SubCategories Area -->
@endif

@if($submenu_all->name_en == 'Graphics Design' ?? 'Null')
@php
    $services = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
@php
    $service_section = App\Models\Service::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
<!-- Start SubCategories Area -->
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Graphics Design</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!--case-area-start -->
<div class="sv-case-area pt-130 pb-130">
 <div class="container">
    <div class="row justify-content-center">
    @foreach($services as $service)
       <div class="col-xl-8">
          <div class="project-section-box-two text-center pb-60">
            <h2 class="tp-title">
               {{ $service->title_en ?? 'NULL' }}
            </h2>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row gx-6">
        @foreach($service_section as $service)
       <div class="col-xl-4 col-lg-4 col-md-6 col-12 wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
          <div class="svcase text-center mb-50">
             <div class="svcase__img fix">
                <img src="{{ asset($service->service_image )}}" alt="">
             </div>
             <div class="svcase__content">
                <h4 class="sv-case-sm-title">
                   <a href="{{ url('single-services/'.$service->id) }}">
                      {{ $service->service_name_en ?? 'NULL' }}
                   </a>
                </h4>
                <p>{!! $service->service_description_en ?? 'NULL' !!}u</p>
             </div>
          </div>
       </div>
       @endforeach
    </div>
    <div class="row">
       <div class="col-12">
          <div class="case-button text-center pt-30">
            <a class="tp-btn-sky" href="{{ route('services.details') }}">View All Services</a>
          </div>
       </div>
    </div>
 </div>
</div>
<!--case-area-end -->
<!-- End SubCategories Area -->
@endif

@if($submenu_all->name_en == 'Team' ?? 'Null')
@php
    $teams = App\Models\Team::where('submenu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px; padding-bottom: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Our Team</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!-- Start Team Area -->
<!-- team-area start-->
<div class="tp-team-area pt-125 pb-100 theme-bg">
  <div class="container">
     <div class="row">
        <div class="team-section-box text-center pb-25">
           <h5 class="tp-subtitle text-white">Our Team</h5>
           <h2 class="tp-title text-white">Meet our
              <span class="tp-section-highlight">
                 team
              </span>
           </h2>
        </div>
     </div>
     @php
        $team_section = App\Models\Team::where('status', 1)->latest()->get();
     @endphp
     <div class="row">
        @foreach($team_section as $team)
        <div class="col-xl-3 col-md-6">
           <div class="tp-team-item mb-30">
              <div class="tp-team-item__img">
                 <img class="w-100" src="{{ asset($team->team_image) }}" width="257" height="290" alt="">
              </div>
              <div class="tp-team-item__info d-flex justify-content-between align-items-center">
                 <div class="tp-team-item__text">
                    <h5 class="tp-team-title">
                       <a href="#">{{ $team->team_name_en ?? 'NULL' }}</a>
                    </h5>
                    <h6 class="tp-team-subtitle">{{ $team->designation_en ?? 'NULL' }}</h6>
                    <a href="{{ $team->facebook ?? 'NULL' }}" target="_blank"><i class="fab fa-facebook" style="padding: 0px 10px;"></i></a>
                    <a href="{{ $team->linkedin ?? 'NULL' }}" target="_blank"><i class="fab fa-linkedin" style="padding: 0px 10px;"></i></a>
                    <a href="{{ $team->github ?? 'NULL' }}" target="_blank"><i class="fab fa-github" style="padding: 0px 10px;"></i></a>
                    <a href="{{ $team->instagram ?? 'NULL' }}" target="_blank"><i class="fab fa-instagram" style="padding: 0px 10px;"></i></a>
                 </div>
                 <div class="tp-team-item__icon">
                    <a href="#"><i class="fal fa-long-arrow-up"></i></a>
                 </div>
              </div>
           </div>
        </div>
        @endforeach
     </div>
  </div>
  <div class="tp-service-button text-center pt-55">
     <a class="tp-btn-yellow-semilar" href="{{ route('projects.details') }}">View All Team <i class="fas fa-arrow-right"></i></a>
  </div>
</div>
<!-- team-area-end -->
<!-- End Team Area -->
@endif

@if($submenu_all->name_en == 'Blog' ?? 'Null')
@php
    $blogs = App\Models\Blog::where('menu_id',$submenu_all->id)->where('status','=', 1)->get();
@endphp
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px; padding-bottom: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Our Blog</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
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
@endif

@if($submenu_all->name_en == 'Shop' ?? 'Null')
@php
    $projects_all = App\Models\Project::where('status', 1)->latest()->get();
@endphp
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px; padding-bottom: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Our Shop</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!-- shop-area-start -->
<!-- product-area-start -->
<div class="tp-product-area pt-130 pb-130">
 <div class="container">
    <div class="row">
        @foreach($projects_all as $project)
       <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".6s">
          <div class="tpproduct text-center mb-30">
             <div class="tpproduct__img">
                <img class="w-100" src="{{ asset($project->project_image) }}" width="257" height="269" alt="">
                <div class="tp-product-icon">
                   <a href="#"><i class="fal fa-shopping-basket"></i></a>
                   <a href="#"><i class="fal fa-heart"></i></a>
                </div>
             </div>
             <div class="tpproduct__meta">
                <h4 class="tp-product-title">
                    <a href="{{ route('projects.details') }}">{{ $project->project_name_en ?? 'NULL' }}</a>
                </h4>
                <span>320000 ৳</span>
                <div class="product-rating">
                   <i class="fas fa-star"></i>
                   <i class="fas fa-star"></i>
                   <i class="fas fa-star"></i>
                   <i class="fas fa-star"></i>
                   <i class="fal fa-star"></i>
                </div>
             </div>
          </div>
       </div>
       @endforeach
    </div>
    <!-- <div class="row">
       <div class="container">
          <div class="col-xl-12">
             <div class="basic-pagination mt-30 text-center">
                <nav>
                   <ul>
                      <li>
                         <a href="blog.html">
                            <i class="far fa-angle-left"></i>
                         </a>
                      </li>
                      <li>
                         <a href="blog.html">1</a>
                      </li>
                      <li>
                         <span class="current">2</span>
                      </li>
                      <li>
                         <a href="blog.html">3</a>
                      </li>
                      <li>
                         <a href="blog.html">
                            <i class="far fa-angle-right"></i>
                         </a>
                      </li>
                   </ul>
                </nav>
             </div>
          </div>
       </div>
    </div> -->
 </div>
</div>
<!-- product-area-end -->
@endif
<!-- shop-area-end -->
<!-- Contact  Area -->
@include('frontend.common.contact')
@endsection