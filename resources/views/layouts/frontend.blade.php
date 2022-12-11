<!doctype html>
<html lang="zxx">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  @php
    $meta = App\Models\Seo::find(1);
  @endphp
  <meta name="description" content="{{ $meta->meta_description }}">
  <meta name="author" content="{{ $meta->meta_author }}">
  <meta name="keywords" content="{{ $meta->meta_keyword }}">
  <meta name="robots" content="all">
  <meta itemprop="meta_google" content="{{ $meta->google_analytics }}">
  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset(get_setting('site_favicon')->value ?? 'Null') }}">
  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom-animation.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/hover-reveal.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css ') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css ') }}">

  <title>Soft Integration Technology Services</title>
  
  <!-- font awesome cdn-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Toastr css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <!-- Header Area -->
    @include('frontend.common.header')

    <!-- Main Content Section -->
    @yield('content')

    <!-- Footer Area -->
    @include('frontend.common.footer')

    <!-- Start Go Top Area -->
    <button class="scroll-top scroll-to-target" data-target="html">
      <i class="fas fa-angle-double-up"></i>
    </button>
    <!-- End Go Top Area -->

    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/jquery.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/waypoints.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/counterup.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/meanmenu.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope-pkgd.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/charming.js ')}}"></script>
    <script src="{{ asset('frontend/assets/js/hover-reveal.js ')}}"></script>
    <script src="{{ asset('frontend/assets/js/tween-max.js ')}}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-form.js ') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js ') }}"></script>

    <!-- Toastr js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- all toastr message show  Update-->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- all toastr message show  old-->
    <script type="text/javascript">
        @if(Session::has('success'))
          toastr.success("{{Session::get('success')}}");
        @endif
        @if(Session::has('info'))
          toastr.info("{{Session::get('info')}}");
        @endif
        @if(Session::has('warning'))
          toastr.warning("{{Session::get('warning')}}");
        @endif
        @if(Session::has('error'))
          toastr.info("{{Session::get('error')}}");
        @endif
        @if(Session::has('danger'))
          toastr.danger("{{Session::get('danger')}}");
        @endif
    </script>
</body>
</html>


