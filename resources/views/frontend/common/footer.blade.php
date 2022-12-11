<footer>
  <div class="tp-footer-area black-bg pt-130 pb-30">
     <div class="container">
        <div class="row wow tpfadeUp" data-wow-duration=".3s" data-wow-delay=".5s">
           <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="tp-footer-widget">
                 <div class="tp-footer-widget__logo mb-30">
                    <a href="{{ route('home') }}">
                      <img src="{{ asset(get_setting('site_footer_logo')->value ?? 'Null') }}" alt="">
                    </a>
                 </div>
                 <div class="tp-footer-widget__text mb-30">
                    <p>A new way to make the payments easy,
                       reliable and 100% secure. claritatem itamconse quat. Exerci tationulla</p>
                 </div>
                 <div class="tp-footer-widget__social-link">
                    <a href="{{ get_setting('facebook_url')->value ?? 'null'}}" target="_blank">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ get_setting('twitter_url')->value ?? 'null'}}" target="_blank">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ get_setting('linkedin_url')->value ?? 'null'}}" target="_blank">
                      <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="{{ get_setting('instagram_url')->value ?? 'null'}}" target="_blank">
                      <i class="fab fa-instagram"></i>
                    </a>
                 </div>
              </div>
           </div>
           <div class="col-xl-3 col-lg-2 col-md-6 d-flex justify-content-lg-center">
              <div class="tp-footer-widget">
                 <div class="tp-footer-widget__title pb-15">
                    <h3 class="footer-title">Usefull Links</h3>
                 </div>
                 <div class="tp-footer-widget__list">
                    <ul>
                      @foreach(get_pages_both_footer() as $page)
                        <li><a href="{{ route('page.all', $page->slug) }}"> {{ $page->name_en }}</a></li>
                      @endforeach
                    </ul>
                 </div>
              </div>
           </div>
           <div class="col-xl-3 col-lg-2 col-md-6">
              <div class="tp-footer-widget pl-20">
                 <div class="tp-footer-widget__title pb-15">
                    <h3 class="footer-title">Pages</h3>
                 </div>
                 <div class="tp-footer-widget__list">
                    <ul>
                      @foreach(get_pages_both_footer() as $page)
                        <li><a href="{{ route('page.all', $page->slug) }}"> {{ $page->name_en }}</a></li>
                      @endforeach
                    </ul>
                 </div>
              </div>
           </div>
           <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="tp-footer-widget">
                 <div class="tp-footer-widget__title pb-15">
                    <h3 class="footer-title">Subscribe Newslatter</h3>
                 </div>
                 <div class="tp-footer-widget__text mb-55">
                    <p>Exerci tation ullamcorper suscipit lobortis nisl aliquip ex ea commodo</p>
                 </div>
                 <div class="tp-footer-widget__input">
                    <form action="{{ route('subscribe.store') }}" method="post">
                      @csrf
                      <input type="text" placeholder="Enter your email" name="email" required="">
                      <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div>

     <div class="tp-copyright-area">
        <div class="container">
           <div class="copyright-border pt-40 wow tpfadeUp" data-wow-duration=".5s" data-wow-delay=".7s">
              <div class="row">
                 <div class="col-xl-6 col-lg-6 col-12">
                    <div class="tp-copyright-left text-lg-start text-start text-md-center">
                       <p>{{ get_setting('copy_right')->value ?? 'Null'}}</p>
                    </div>
                 </div>
                 <!-- <div class="col-xl-6 col-lg-6 col-12">
                    <div class="tp-copyright-right text-start text-md-center text-lg-end">
                       <a href="#">Terms and conditions</a>
                       <a href="#"> Privacy policy</a>
                    </div>
                 </div> -->
              </div>
           </div>
        </div>
     </div>
  </div>
</footer>