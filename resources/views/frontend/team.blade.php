@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Team Details</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>

<!-- team-area start-->
<div class="tp-team-area pt-125 pb-100 theme-bg" style="margin-top: 50px;">
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
</div>
<!-- team-area-end -->
<!-- Contact  Area -->
@include('frontend.common.contact')
<!-- Contact  Area -->
@endsection