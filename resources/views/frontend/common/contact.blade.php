<!--contact-area-start -->
<div class="tp-contact-area pt-40 pb-130">
  <div class="container">
     <div class="row">
        <div class="col-xl-6 col-lg-6">
          <div class="tp-contct-wrapper contact-space-40">
           <div class="tp-contact-thumb mb-60">
              <img src="{{ asset(get_setting('site_contact_logo')->value ?? 'Null') }}" alt="">
           </div>
           <div class="tp-contact-info mb-40">
              <h4 class="contact-title">Mail Address</h4>
              <span><a href="mailto:{{ get_setting('email')->value ?? 'null'}}">{{ get_setting('email')->value ?? 'null'}}</a></span>
           </div>
           <div class="tp-contact-info mb-40">
              <h4 class="contact-title">Phone Number</h4>
              <span><a href="tel:{{ get_setting('phone')->value ?? 'null'}}">(+{{ get_setting('phone')->value ?? 'null'}})</a></span>
           </div>
           <div class="tp-contact-info">
              <h4 class="contact-title">Address line</h4>
              <span><a href="#">{{ get_setting('business_address')->value ?? 'null'}}</a></span>
           </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 shadow">
           <div class="tpcontact">
              <h4 class="tp-contact-big-title">Let’s Talk...</h4>
              <div class="tpcontact__form tpcontact__form-3">
                <form action="{{ route('send.email') }}" method="post">
                    @csrf
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input name="name" type="text" placeholder="Enter your Name">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input name="email" type="email" placeholder="Enter your Mail">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input name="phone" type="number" placeholder="Enter your Phone">
                    @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input name="subject" type="text" placeholder="Enter your Subject">
                    @error('message')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="message" placeholder="Enter your Massage"></textarea>
                    <button type="submit" class="tp-btn-yellow">Send Massage</button>
                </form>
              </div>
              <p class="ajax-response"></p>
           </div>
        </div>
     </div>
  </div>
</div>
<!-- contact-area-end -->