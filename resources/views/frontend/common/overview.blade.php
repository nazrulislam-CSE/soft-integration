<!-- Start Overview Area -->
<div class="overview-area pt-100 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="overview-card">
                    <h3>Call Us</h3>
                   <i class="ri-phone-line"></i>
                        <span>Phone: <a href="tel:{{ get_setting('phone')->value ?? 'null'}}">{{ get_setting('phone')->value ?? 'null'}}</a>
                        </span>

                    <div class="overview-shape">
                        <img src="{{ asset('frontend/assets/images/overview/overview-shape.png ') }}" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="overview-card">
                    <h3>Email Us</h3>
                      <i class="ri-phone-line"></i>
                        <span>Email: <a href="mailto:{{ get_setting('email')->value ?? 'null'}}">{{ get_setting('email')->value ?? 'null'}}</a>
                    </span>

                    <div class="overview-shape">
                        <img src="{{ asset('frontend/assets/images/overview/overview-shape.png ') }}" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="overview-card">
                    <h3>Tech Support</h3>
                    <span>
                        <a href="tel:15143125678">{{ get_setting('phone')->value ?? 'null'}}</a>
                    </span>

                    <div class="overview-shape">
                        <img src="{{ asset('frontend/assets/images/overview/overview-shape.png ') }}" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="overview-card">
                    <h3>Visit Us</h3>
                    <span>{{ get_setting('business_address')->value ?? 'null'}}</span>

                    <div class="overview-shape">
                        <img src="{{ asset('frontend/assets/images/overview/overview-shape.png ') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Overview Area -->