<!-- tp-header-area-start -->
<header class="d-none d-lg-block">
   <div id="header-sticky" class="tp-header-area-two tp-header-bs-area header-space-three pt-0 shadow-lg">
      <div class="container-fluid">
         <div class="row align-items-center">
            <div class="col-xxl-3 col-xl-3 col-lg-3">
               <div class="tp-logo text-start">
                  <a href="{{ route('home') }}">
                     <img src="{{ asset(get_setting('site_logo')->value ?? 'Null') }}" alt="">
                  </a>
               </div>
            </div>
            <div class="col-xxl-5 col-xl-6 col-lg-6">
               <div class="tp-main-menu tp-menu-black tp-bs-menu text-center z-index-1">
                  <nav id="mobile-menu">
                     <ul>
                        <li class="has-dropdown">
                           <a href="{{ route('home') }}">Home</a> 
                        </li>
                        @foreach($menus as $menu)
                           <li class="has-dropdown ">
                              <a href="{{ route('menu.show.index', $menu->slug)}}">{{ $menu->name_en }}</a>
                              @php
                                 $submenus = App\Models\Submenu::where('menu_id',$menu->id)->where('status','=', 1)->get();
                              @endphp
                               
                              @if($submenus->count() > 0)
                              <ul class="submenu text-start">
                                 @foreach($submenus as $submenu)
                                    <li>
                                       <a href="{{ route('submenu.show.index', $submenu->slug)}}">{{ $submenu->name_en}}</a>
                                    </li>
                                 @endforeach
                              </ul>
                              @endif
                           </li>
                        @endforeach
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-3 col-lg-3">
               <div class="tp-header-left d-flex align-items-center justify-content-end ">
                  <ul class="d-none d-xxl-block">
                     <li><a class="#" href="login.html"><i class="far fa-user fa-user"></i> Login</a></li>
                     <li><a class="#" href="#">EN<i class="fal fa-arrow-down arrow-down"></i></a>
                        <ul>
                           <li><a href="#">English</a></li>
                           <li><a href="#">Arabic</a></li>
                           <li><a href="#">Spanish</a></li>
                        </ul>
                     </li>
                  </ul>
                  <div class="tp-header-yellow-button">
                     @auth
                        <a href="{{ route('admin.dashboard') }}" target="_blank"><i style="margin-right: 5px;" class="icon fa fa-user"></i>User Profile</a>
                     @else
                        <a href="{{ route('login') }}" target="_blank"><i style="margin-right: 5px;" class="icon fa fa-lock"></i>Login</a>
                     @endauth
                  </div>
                  <div class="tp-header-yellow-button ml-55">
                     <a class="tp-btn-yellow-semilar" href="http://127.0.0.1:8000/page/contact-us">Get a Quote</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- tp-header-area-end -->

<!-- header-md-menu-start -->
<div id="header-sticky-mobile" class="tp-md-header-area d-md-block d-lg-none pt-20 pb-20 shadow-lg">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-md-6 col-6">
            <div class="tp-logo">
               <a href="{{ route('home') }}">
                  <img src="{{ asset(get_setting('site_logo')->value ?? 'Null') }}" alt="">
               </a>
            </div>
         </div>
         <div class="col-md-6 col-6">
            <div class="tp-header-right tp-shadow-transparent z-index-1 d-flex align-items-center justify-content-end">
               <a class="tp-btn-yellow-semilar d-none d-md-block" href="http://127.0.0.1:8000/page/contact-us">Get a Quote</a>
               <button class="tp-menu-bar"><i class="fal fa-bars"></i></button>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- header-md-menu-end -->