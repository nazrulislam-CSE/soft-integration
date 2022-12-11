@extends('layouts.frontend')
@section('content')

<div class="tp-offcanvas-area">
   <div class="tpoffcanvas">
      <div class="tpoffcanvas__logo">
         <a href="#">
         <img src="{{ asset('frontend/assets/img/logo/logo-white.png ') }}" alt="">
         </a>
      </div>
      <div class="tpoffcanvas__close-btn">
         <a class="close-btn" href="javascript:void(0)"><i class="fal fa-times-hexagon"></i></a>
      </div>
      <div class="tpoffcanvas__content d-none d-sm-block">
         <p>We deploy world-class Creative <br> on demand.</p>
      </div>
      <div class="mobile-menu">
      </div>
      <div class="tpoffcanvas__contact">
         <span>Contact us</span>
         <ul>
            <li><i class="fas fa-star"></i>
               <a href="#">{{ get_setting('business_address')->value ?? 'null'}}</a>
            </li>
            <li><i class="fas fa-star"></i> <a href="mailto:{{ get_setting('phone')->value ?? 'null'}}">{{ get_setting('phone')->value ?? 'null'}}</a></li>
            <li><i class="fas fa-star"></i> <a href="mailto:{{ get_setting('email')->value ?? 'null'}}">{{ get_setting('email')->value ?? 'null'}}</a></li>
         </ul>
      </div>
      <div class="tpoffcanvas__input d-none d-sm-block">
         <p>Get UPdate</p>
         <form class="p-relative" action="{{ route('subscribe.store') }}" method="post">
            @csrf
            <input type="text" placeholder="Enter your email" name="email">
            <button type="submit"><i class="fas fa-paper-plane"></i></button>
         </form>
      </div>
     <!--  <div class="tpoffcanvas__instagram d-none d-sm-block">
         <p>Check Instagram POst</p>
         <div class="tp-insta">
            <div class="row">
               <div class="col-3 col-sm-3"><a href="#"><img src="{{ asset('frontend/assets/img/offcanvas/insta-1.jpg ') }}" alt=""></a></div>
               <div class="col-3 col-sm-3"><a href="#"><img src="{{ asset('frontend/assets/img/offcanvas/insta-2.jpg ') }}" alt=""></a></div>
               <div class="col-3 col-sm-3"><a href="#"><img src="{{ asset('frontend/assets/img/offcanvas/insta-4.jpg ') }}" alt=""></a></div>
               <div class="col-3 col-sm-3"><a href="#"><img src="{{ asset('frontend/assets/img/offcanvas/insta-4.jpg ') }}" alt=""></a></div>
            </div>
         </div>
      </div> -->
   </div>
</div>
<div class="body-overlay"></div>

<main>
   @php
      $sliders = App\Models\Slider::where('status', 1)->latest()->get();
   @endphp
   <!-- Start Main Hero Area -->
   <div class="main-hero-area">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            @foreach($sliders as $slider )
            <div class="carousel-item active">
                <style>
                    @media only screen and (max-width: 767px) {
                        .carousel_img_slider{
                            width:100%;
                            height:150px !important;
                        }
                      .carousel-caption{
                       
                      }
                      .slider_title{
                          font-size:15px;
                          padding-top:100px !important;
                      }
                      .our_products{
                          display:none;
                      }
                      .slider_description{
                          display:none;
                      }
                      .get_quoute{
                          padding-top:20px;
                          padding: 4px 13px;
                      }
                      .view_more{
                          margin-right: 110px;
                      }
                    }
                </style>
              <img class="d-block w-100" src="{{ asset($slider->slider_image)}}" alt="First slide" style="height:385px;">
                <div class="carousel-caption  d-md-block">
                
                    <h1 data-aos="fade-left" class="slider_title text-white">{{ $slider->title_en}}<span class="overlay"></span></h1>
                    <p data-aos="fade-left" class="text-light slider_description">{!! $slider->description_en !!}</p>
                    
                    <div class="slides-btn" data-aos="fade-left" >
                        <a href="/pag/shop" class="default-btn text-left tp-btn-yellow-semilar our_products">Our Products<i class="fas fa-arrow-right"></i></a>
                        <a href="/page/contact-us" class="default-btn text-right tp-btn-yellow-semilar get_quoute">Get a Quote<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
         </div>
     </div>
   </div>
   <!-- End Main Hero Area -->
   
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
                        <a class="tp-btn-sky" href="/page/about">{{ $about->button_name_en ?? 'NULL' }}</a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>
   <!-- tp-about-area-end -->

   <!--service-area-start -->
   <div class="tp-service-area pt-125 pb-120">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               @foreach($services as $service)
               <div class="tp-service-section-box text-center pb-35">
                  <h5 class="tp-subtitle">{{ $service->name_en ?? 'NULL' }}</h5>
                  <h2 class="tp-title">
                     {{ $service->title_en ?? 'NULL' }}
                  </h2>
               </div>
               @endforeach
            </div>
         </div>
         @php
            $service_section = App\Models\Service::orderBy('created_at','ASC')->where('status', 1)->take(3)->latest()->get();
         @endphp
         <div class="row gx-17">
            @foreach($service_section as $service)
               <div class="col-xl-4 col-md-6">
                  <div class="tp-services-item text-center service-color-1 mb-30  wow tpfadeUp" data-wow-duration="1s" data-wow-delay=".3s">
                     <div class="tp-services-item__icon mb-35">
                        <img src="{{ asset($service->service_image )}}" width="116" height="123" alt="">
                     </div>
                     <div class="tp-services-item__content">
                        <h3 class="tp-sv-title">
                           <a href="{{ url('single-services/'.$service->id) }}">
                              {{ $service->service_name_en ?? 'NULL' }}
                           </a>
                        </h3>
                        <p>
                           {!! $service->service_description_en ?? 'NULL' !!}
                        </p>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="row">
            <div class="col-xl-12 wow tpfadeUp" data-wow-duration="1s" data-wow-delay=".5s">
               <div class="tp-service-button text-center pt-55">
                  <a class="tp-btn" href="{{ route('services.details') }}">View All Services <i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--service-area-end -->

   <!-- project-area-start -->
   <div class="tp-project-area pt-125 pb-100 grey-bg fix">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-12">
               <div class="tp-project-section-box text-center pb-25">
                  <h5 class="tp-subtitle">Projects</h5>
                  <h2 class="tp-title">
                     Our Latest Incredible Client's Projects
                  </h2>
               </div>
            </div>
         </div>
         @php
            $projects_all = App\Models\Project::where('status', 1)->take(3)->latest()->get();
         @endphp
         <div class="tp-project-slider-section-three">
            <div class="swiper-container project-slider-three-active">
               <div class="swiper-wrapper">
                  @foreach($projects_all as $project)
                     <div class="swiper-slide">
                        <div class="tp-project-item-three text-center p-relative">
                           <div class="tp-project-item-three__img">
                              <img src="{{asset($project->project_image) }}" width="648" height="373" alt="">
                           </div>
                           <div class="tp-project-item-three__bg">
                              <div class="tp-project-item-three__bg-info">
                                 <h3 class="tp-project-title"><a href="{{ url('single-project/'.$project->id) }}">{{ $project->project_name_en ?? 'NULL'}}</a></h3>
                                 <h5 class="tp-project-subtitle">Laravel</h5>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
            <div class="project-slider-dots text-center"></div>
            <div class="tp-service-button text-center pt-55">
               <a class="tp-btn" href="{{ route('projects.details') }}">View All Project <i class="fas fa-arrow-right"></i></a>
            </div>
         </div>
      </div>
   </div>
   <!-- project-area-end -->

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
         <a class="tp-btn-yellow-semilar" href="{{ route('team.details') }}">View All Team <i class="fas fa-arrow-right"></i></a>
      </div>
   </div>
   <!-- team-area-end -->

   <!-- testimonial-area start-->
   <div class="tp-testimonial-area black-bg pt-130 pb-130 fix">
      <div class="container-fluid">
         <div class="row">
            @foreach($testimonials as $testimonial)
            <div class="col-xl-12">
               <div class="tp-testimonial-section-box text-center pb-25">
                  <h5 class="tp-subtitle"> {{ $testimonial->name_en ?? 'NULL' }}</h5>
                  <h2 class="tp-title tp-white-text">{{ $testimonial->title_en ?? 'NULL' }}</h2>
               </div>
            </div>
            @endforeach
         </div>
         @php
             $testimonials = App\Models\Testimonial::where('status', 1)->latest()->get();
         @endphp
         <div class="tp-testimonial-slider-section d-flex justify-content-center mb-50">
            <div class="swiper-container testimonial-slider-active">
               <div class="swiper-wrapper">
                  @foreach($testimonials as $testimonial)
                  <div class="swiper-slide">
                     <div class="tp-testimonial-item">
                        <div class="tp-testi-meta d-flex justify-content-between mb-40">
                           <div class="tp-testi-icon-box d-flex align-items-center">
                              <div class="tp-testi-img mr-20">
                                 <img src="{{ asset($testimonial->testimonial_image )}}" alt="">
                              </div>
                              <div class="tp-testi-client-position">
                                 <h3>{{ $testimonial->testimonial_name_en ?? 'NULL' }}</h3>
                                 <h6>{{ $testimonial->testimonial_designation_en ?? 'NULL' }}</h6>
                              </div>
                           </div>
                           <div class="tp-testi-ratting">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                           </div>
                        </div>
                        <div class="tp-testi-p-text">
                           <p>{!! $testimonial->testimonial_description_en !!}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- testimonial-area-end -->

   <!-- tp-barnd-area-start -->
   <div class="tp-brand-area pt-130 pb-20">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="tp-brand-title-four text-center pb-60">
                  <h5 class="tp-subtitle">Partner Logo Section</h5>
                  <h4 class="tp-brand-title">Over <b>35k+</b> Software business growing with collax</h4>
               </div>
            </div>
         </div>
         <div class="tp-brand-slider-section">
            <div class="swiper-container brand-slider-active">
               <div class="swiper-wrapper d-flex align-items-center">
                  @php
                     $logos = App\Models\Logo::where('status', 1)->latest()->get();
                  @endphp
                   @foreach($logos as $logo)
                  <div class="swiper-slide">
                     <div class="tp-brand-icon text-center">
                        <img src="{{ asset($logo->logo_image )}}" width="125" height="36" alt="">
                     </div>
                    
                  </div>
                   @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- tp-barnd-area-end -->

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
         <div class="tp-service-button text-center pt-55">
            <a class="tp-btn" href="{{ route('blog.details') }}">View All Blog <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
   <!-- blog-area-end -->

   <!-- Start Contact Us Area -->
   @include('frontend.common.contact')
   <!-- End Contact Us Area -->
</main>
@endsection