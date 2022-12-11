@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Single Service</h3>
              <a href="http://127.0.0.1:8000/page/contact-us" class="tp-btn-white-border">Lets work together <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- breadcrumb area end -->
<!-- service-details- area- start -->
<div class="service-details-area" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
           <div class="col-12">
              <div class="sd-big-img">
                <img src="{{ asset($services->service_image )}}" width="1116" height="673" alt="">
              </div>
           </div>
           <div class="col-xl-6 col-lg-6">
              <div class="sd-service-details">
                <h3 class="tp-title-sm service-details-space"> {{ $services->service_name_en ?? 'NULL' }}</h3>
              </div>
           </div>
           <div class="col-xl-6 col-lg-6">
              <div class="sd-service-details-paragraph">
                <p class="pb-15">{{ $services->service_description_en ?? 'NULL' }}<p>
              </div>
           </div>
        </div>
    </div>
</div>
<!-- Contact  Area -->
@include('frontend.common.contact')
@endsection