@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Project Details</h3>
              <a href="{{ route('home') }}" class="tp-btn-white-border">Back To Home <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>

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
<!-- End Projects Area -->
<!-- Contact  Area -->
@include('frontend.common.contact')
<!-- Contact  Area -->
@endsection