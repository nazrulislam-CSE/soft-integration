@extends('layouts.frontend')
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area  breadcrumb__pt-300 include-bg p-relative"
 data-background="{{ asset('frontend/assets/img/breadcrum/ab-1.1.jpg ') }}" style="padding-top: 100px;">
 <div class="container">
    <div class="row">
       <div class="col-xxl-12">
          <div class="breadcrumb__content p-relative z-index-1">
             <h3 class="breadcrumb__title">Single Blog</h3>
              <a href="http://127.0.0.1:8000/page/contact-us" class="tp-btn-white-border">Lets work together <i class="fas fa-arrow-right"></i></a>
          </div>
       </div>
    </div>
 </div>
</section>
<!-- Contact  Area -->
<!-- Blog area start -->
<div class="postbox__area pt-120 pb-120">
 <div class="container">
    <div class="row">
       <div class="col-xxl-8 col-xl-8 col-lg-8 col-12">
          <div class="postbox__wrapper">
             <article class="postbox__item format-image transition-3">
                <div class="postbox__content">
                   <p><img class="w-100" src="{{ asset($blogs->blog_image )}}" alt="" width="734" height="350"></p>
                   <div class="postbox__meta">
                      <span><a href="#"><i class="fal fa-user-circle"></i> {{ Auth::user()->name ?? 'Null' }} </a></span>
                      <span><a href="#"><i class="fal fa-clock"></i> {!! date('d/M/y', strtotime($blogs->created_at)) !!}</a></span>
                      <span><a href="#"><i class="fal fa-comment-alt-lines"></i>(04) Coments</a></span>
                      <span><a href="#"><i class="fal fa-eye"></i> 1,526 views</a></span>
                   </div>
                   <h3 class="postbox__title">
                    {{ $blogs->blog_name_en ?? 'NULL' }}
                   </h3>
                   <div class="postbox__text">
                      <p>{!! $blogs->blog_description_en ?? 'NULL' !!}</p>
                   </div>

                 <!--   <div class="postbox__thumb2">
                      <div class="row gx-50">
                         <div class="col-xl-6">
                            <p><img src="{{ asset('frontend/assets/img/blog-details/blog-big-4.jpg ') }}" alt=""></p>
                         </div>
                         <div class="col-xl-6">
                            <p><img src="{{ asset('frontend/assets/img/blog-details/blog-sm-5.jpg ') }}" alt=""></p>
                         </div>
                      </div>
                   </div> -->
                   <div class="postbox__social-wrapper">
                      <div class="row">
                         <div class="col-xl-12 col-lg-12">
                            <div class="postbox__social text-xl-end text-start">
                               <span>Share</span>
                               <a href="{{ get_setting('linkedin_url')->value ?? 'null'}}"><i class="fab fa-linkedin tp-linkedin"></i></a>
                               <a href="{{ get_setting('youtube_url')->value ?? 'null'}}"><i style="color:red;" class="fab fa-youtube tp-youtube"></i></a>
                               <a href="{{ get_setting('facebook_url')->value ?? 'null'}}"><i class="fab fa-facebook tp-facebook" ></i></a>
                               <a href="{{ get_setting('twitter_url')->value ?? 'null'}}"><i class="fab fa-twitter tp-twitter"></i></a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </article>
             <div class="postbox__comment mb-65">
                <h3 class="postbox__comment-title">(04) Comment</h3>
                <ul>
                   <li>
                      <div class="postbox__comment-box d-flex">
                         <div class="postbox__comment-info ">
                            <div class="postbox__comment-avater mr-20">
                               <img src="{{ asset('frontend/assets/img/testimonial/testi-4.2.png ') }}" alt="">
                            </div>  
                         </div>
                         <div class="postbox__comment-text">
                            <div class="postbox__comment-name">
                               <h5>Kristin Watson</h5>
                               <span class="post-meta"> July 14, 2022</span>
                            </div>
                            <p>Patient Comments are a collection of comments submitted by viewers in <br> response to a question posed by a MedicineNet doctor.</p>
                            <div class="postbox__comment-reply">
                               <a href="#">Reply</a>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li class="children">
                      <div class="postbox__comment-box  d-flex">
                         <div class="postbox__comment-info">
                            <div class="postbox__comment-avater mr-20">
                               <img src="{{ asset('frontend/assets/img/testimonial/testi-4.5.png ') }}" alt="">
                            </div> 
                         </div>
                         <div class="postbox__comment-text">
                            <div class="postbox__comment-name">
                               <h5>Farhan Firoz</h5>
                               <span class="post-meta"> July 14, 2022</span>
                            </div>
                            <p>Include anecdotal examples of your experience, or things you took notice of that <br> you feel others would find useful.</p>
                            <div class="postbox__comment-reply">
                               <a href="#">Reply</a>
                            </div>
                         </div>
                      </div>
                   </li>
                   <li>
                      <div class="postbox__comment-box d-flex">
                         <div class="postbox__comment-info ">
                            <div class="postbox__comment-avater mr-20">
                               <img src="{{ asset('frontend/assets/img/testimonial/testi-4.1.png ') }}" alt="">
                            </div>
                         </div>
                         <div class="postbox__comment-text">
                            <div class="postbox__comment-name">
                               <h5>Salim Rana</h5>
                               <span class="post-meta"> July 14, 2022</span>
                            </div>
                            <p>Include anecdotal examples of your experience, or things you took notice of that <br> you feel others would find useful.</p>
                            <div class="postbox__comment-reply">
                               <a href="#">Reply</a>
                            </div>
                         </div>
                      </div>
                   </li>
                </ul>
             </div>
             <div class="postbox__comment-form shadow-lg">
                <h3 class="postbox__comment-form-title">Leave a Reply</h3>
                <form action="{{ route('send.email') }}" method="post">
                    @csrf
                   <div class="row">
                      <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="postbox__comment-input">
                            <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Your name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="postbox__comment-input">
                            <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Your email address">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="postbox__comment-input">
                            <input type="number" name="phone" class="form-control" required data-error="Please enter your phone" placeholder="Your Phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="postbox__comment-input">
                           <input type="text" name="subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-xxl-12">
                        <div class="postbox__comment-input">
                            <textarea name="message" class="form-control" cols="30" rows="6"  data-error="Please enter your message" placeholder="Your message..."></textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-xxl-12">
                         <div class="postbox__comment-agree d-flex align-items-start mb-20">
                            <input class="e-check-input" type="checkbox" id="e-agree">
                            <label class="e-check-label" for="e-agree">Save my name, email, and website in this browser for the next time I comment.</label>
                         </div>
                      </div>
                      <div class="col-xxl-12">
                         <div class="postbox__comment-btn">
                            <button type="submit" class="tp-btn-yellow">Post comment</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
       <div class="col-xxl-4 col-xl-4 col-lg-4">
          <div class="sidebar__wrapper">
             <div class="sidebar__widget mb-40">
                <h3 class="sidebar__widget-title">Search Here</h3>
                <div class="sidebar__widget-content">
                   <div class="sidebar__search">
                      <form action="#">
                         <div class="sidebar__search-input-2">
                            <input type="text" placeholder="Search your keyword...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
             <div class="sidebar__widget mb-40">
                <h3 class="sidebar__widget-title">Recent Post</h3>
                <div class="sidebar__widget-content">
                    @php
                        $blogs = App\Models\Blog::where('status', 1)->latest()->get();
                    @endphp
                   <div class="sidebar__post rc__post">
                    @foreach($blogs as $blog)
                      <div class="rc__post mb-20 d-flex align-items-center">
                         <div class="rc__post-thumb mr-20">
                            <a href="{{ url('single-blog/'.$blog->id) }}">
                                <img src="{{ asset($blog->blog_image )}}" alt="">
                            </a>
                         </div>
                         <div class="rc__post-content">
                            <div class="rc__meta">
                               <span>{!! date('d/M/y', strtotime($blog->created_at)) !!}</span>
                            </div>
                            <h3 class="rc__post-title">
                               <a href="{{ url('single-blog/'.$blog->id) }}">{{ $blog->blog_name_en ?? 'NULL' }}</a>
                            </h3>
                         </div>
                      </div>
                    @endforeach 
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!-- Blog area end -->

<!-- Contact  Area -->
@endsection