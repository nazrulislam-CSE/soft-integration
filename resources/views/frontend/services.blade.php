@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Services Details</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
@php
    $service_section = App\Models\Service::orderBy('created_at','ASC')->where('status', 1)->latest()->get();
@endphp
<!-- service-details- area- start -->
<div class="service-details-area" style="padding-top: 50px;">
    <div class="container">
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
    </div>
</div>
<!-- Contact  Area -->
@include('frontend.common.contact')
<!-- Contact  Area -->
@endsection