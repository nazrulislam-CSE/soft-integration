@extends('layouts.frontend')
@section('content')

@if($menu_all->name_en == 'About')
<!-- Start About Area -->
@php
    $about_section = App\Models\About::where('status', 1)->latest()->get();
@endphp
<!-- tp-about-area-start -->
<div class="tp-about-area grey-bg pt-120 pb-120 p-relative fix">
  <div class="bs-about-sm-1 d-none d-lg-block">
     <img src="{{ asset('frontend/assets/img/chose/hero-shape-5.1.png ')}}" alt="">
  </div>
  <div class="bs-about-sm-2 d-none d-lg-block">
     <img src="{{ asset('frontend/assets/img/chose/bp-chose-5.2.png ')}}" alt="">
  </div>
  <div class="bp-about-shape d-none d-md-block">
     <img src="{{ asset('frontend/assets/img/about/about-shape-6.1.png ')}}" alt="">
  </div>
  <div class="container">
     <div class="row align-items-center">
        @foreach($about_section as $about)
           <div class="col-xl-5 col-lg-5 wow tpfadeLeft" data-wow-duration=".3s" data-wow-delay=".5s">
              <div class="bp-about-img">
                 <img src="{{ asset($about->about_image)}}" alt="">
              </div>
           </div>
           <div class="col-xl-7 col-lg-7 col-md-10 col-12 wow tpfadeRight" data-wow-duration=".5s" data-wow-delay=".7s">
              <div class="tp-feature-section-title-box bs-section-title-space">
                 <h5 class="tp-subtitle tp-subtitle-before-color pb-10">{{ $about->name_en ?? 'NULL' }}</h5>
                 <h2 class="tp-title tp-title-sm">
                    {{ $about->title_en ?? 'NULL' }}
                 </h2>
                 <p class="pb-25">
                    {!! $about->description_en ?? 'NULL' !!}
                 </p>
                 <div class="tp-fea-button-five">
                    <a class="tp-btn-sky" href="http://127.0.0.1:8000/page/about">{{ $about->button_name_en ?? 'NULL' }}</a>
                 </div>
              </div>
           </div>
        @endforeach
     </div>
  </div>
</div>
<!-- tp-about-area-end -->

<!-- mission-area-start -->
<div class="tp-mission-area pt-130 p-relative">
 <div class="bp-mission-shape-1 d-none d-lg-block">
    <img src="{{ asset('frontend/assets/img/mission/mission-shape-5.1.png ') }}" alt="">
 </div>
 <div class="bp-mission-shape-2 d-none d-lg-block">
    <img src="{{ asset('frontend/assets/img/mission/mission-shape-5.6.png ') }}" alt="">
 </div>
 <div class="bp-mission-shape-3 d-none d-lg-block">
    <img src="{{ asset('frontend/assets/img/mission/mission-shape-5.3.png ') }}" alt="">
 </div>
<div class="container">
    <div class="row">
       <div class="col-xl-6 col-lg-7 col-md-11 wow tpfadeLeft"  data-wow-duration=".5s" data-wow-delay=".7s">
          <div class="tp-mission-tab-section pb-10">
             <nav>
                <div class="nav tp-mission-tab " id="nav-tab" role="tablist">
                   <button class="nav-links active" id="nav-Mission-tab" data-bs-toggle="tab"
                      data-bs-target="#Mission" type="button" role="tab" aria-controls="nav-Mission-tab"
                      aria-selected="true"><span>Our Mission</span></button>

                   <button class="nav-links" id="nav-Vission-tab" data-bs-toggle="tab" data-bs-target="#Vission"
                      type="button" role="tab" aria-controls="nav-Vission-tab" aria-selected="true"><span>Our
                         Vission</span></button>

                   <button class="nav-links" id="nav-Value-tab" data-bs-toggle="tab" data-bs-target="#Value"
                      type="button" role="tab" aria-controls="nav-Value-tab" aria-selected="true"><span>Our
                         Value</span></button>
                </div>
             </nav>
          </div>
          <div class="tab-content" id="nav-tabContent">
             <div class="tab-pane fade show active " id="Vission" role="tabpanel"
                aria-labelledby="nav-Vission-tab" tabindex="0">
                <div class="tpmission">
                   <div class="tpmission__content">
                      <h2 class="tp-mission-title">We laed your
                         <span class="tp-section-highlight">
                            business
                            <svg width="201" height="12" viewBox="0 0 201 12" fill="none" xmlns="">
                               <path d="M0 0L201 12H0V0Z" fill="#FFDC60"/>
                            </svg>
                         </span> 
                          team to victory
                      </h2>
                      <p class="pb-20">We are a team of passionate business consultant,s & Technology <br>
                         veterans eager to help companies rech their full potential.</p>
                      <p>By understanding the client,s condition and leveraging our best
                         experience and knowledge. we support reform by recommending
                         the most appropriate methods and sesources.By understanding the client,s condition and
                         leveraging our experience and knowledge. we support reform by recommending the most .
                      </p>
                   </div>
                </div>
             </div>
             <div class="tab-pane fade " id="Value" role="tabpanel" aria-labelledby="nav-Value-tab"
                tabindex="0">
                <div class="tpmission">
                   <div class="tpmission__content">
                      <h2 class="tp-mission-title">Our vision is to
                         <span class="tp-section-highlight">
                            provide
                            <svg width="160" height="11" viewBox="0 0 160 11" fill="none"
                               xmlns="">
                               <path d="M0 0L160 11H0V0Z" fill="#FFDC60" />
                            </svg>
                         </span>
                          better service - in over the world
                      </h2>
                      <p class="pb-20">We are a team of passionate business consultant,s & Technology <br>
                         veterans eager to help companies rech their full potential.</p>
                      <p>By understanding the client,s condition and leveraging our best
                         experience and knowledge. we support reform by recommending
                         the most appropriate methods and sesources.By understanding the client,s condition and
                         leveraging our experience and knowledge. we support reform by recommending the most .
                      </p>
                   </div>
                </div>
             </div>
             <div class="tab-pane fade" id="Mission" role="tabpanel" aria-labelledby="nav-Mission-tab"
                tabindex="0">
                <div class="tpmission">
                   <div class="tpmission__content">
                      <h2 class="tp-mission-title">Work with one of the fastest-growing
                         <span class="tp-section-highlight">
                            digital
                            <svg width="160" height="11" viewBox="0 0 160 11" fill="none"
                               xmlns="">
                               <path d="M0 0L160 11H0V0Z" fill="#FFDC60" />
                            </svg>
                         </span>
                          consultancies
                      </h2>
                      <p class="pb-20">We are a team of passionate business consultant,s & Technology <br>
                         veterans eager to help companies rech their full potential.</p>
                      <p>By understanding the client,s condition and leveraging our best
                         experience and knowledge. we support reform by recommending
                         the most appropriate methods and sesources.By understanding the client,s condition and
                         leveraging our experience and knowledge. we support reform by recommending the most .
                      </p>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-xl-6 col-lg-5 col-md-12 wow tpfadeRight"  data-wow-duration=".5s" data-wow-delay=".7s">
          <div class="tp-mission-img">
             <img src="{{ asset('frontend/assets/img/mission/collage.png ') }}" alt="">
          </div>
       </div>
    </div>
 </div>
</div>
<!-- mission-area-end -->
@endif
<!-- End About Area -->

@if($menu_all->name_en == 'Services')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Our Services</h3>
              <a href="http://127.0.0.1:8000/page/contact-us" class="tp-btn-white-border">Lets work together <i class="fas fa-arrow-right"></i></a>
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
    @php
        $service_section = App\Models\Service::orderBy('created_at','ASC')->where('status', 1)->latest()->get();
     @endphp
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
<!-- End Services Area -->

@if($menu_all->name_en == 'Projects')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Our Project</h3>
              <a href="http://127.0.0.1:8000/page/contact-us" class="tp-btn-white-border">Lets work together <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!-- project-area-start -->
<div class="tp-project-area tp-cc-project pt-130 pb-100">
 <div class="container">
    @php
        $projects = App\Models\Project::where('status', 1)->latest()->get();
    @endphp
    <div class="row grid">
       @foreach($projects as $project)
       <div class="col-xl-4 col-lg-4 col-md-6 grid-item cat2 cat4">
          <div class="tp-project-item-four tp-img-reveal-item mb-30" data-subtitle="Laravel" data-title="{{ $project->project_name_en }}" data-fx="1">
            <div class="tp-project-item-four__img fix">
                <a href="{{ url('single-project/'.$project->id) }}">
                    <img class="w-100" src="{{ asset($project->project_image) }}" width="352" height="363" alt="">
                </a>
             </div>
          </div>
       </div>
       @endforeach
    </div>
 </div>
</div>
@endif
<!-- End Projects Area -->

@if($menu_all->name_en == 'Contact Us')

@endif

<!-- Contact  Area -->
@include('frontend.common.contact')
@endsection