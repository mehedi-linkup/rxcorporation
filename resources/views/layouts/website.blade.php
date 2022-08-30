<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title') - {{$content->company_name}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="favicon.ico" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('website')}}/css/googlefonts.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('website')}}/css/animate.min.css" rel="stylesheet">
  <link href="{{asset('website')}}/css/aos.css" rel="stylesheet">
  <link href="{{asset('website')}}/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="{{asset('website')}}/css/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('website')}}/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('website')}}/cssremixicon.css" rel="stylesheet">
  <link href="{{asset('website')}}/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('website')}}/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="{{asset('website')}}/css/simple-lightbox.min.css">
  @stack('website-css')
  <!-- Template Main CSS File -->
  <link href="{{asset('website')}}/css/style.css" rel="stylesheet">
  <script src="{{asset('website')}}/js/jquery.min.js"></script>
 
</head>

<body>

@include('partial.website_header')

  <!-- ======= Hero Section ======= -->

  </section><!-- End Hero -->
  @yield('website-content')
  @include('partial.website_footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('website')}}/js/purecounter.js"></script>
  <script src="{{asset('website')}}/js/aos.js"></script>
  <script src="{{asset('website')}}/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('website')}}/js/swiper-bundle.min.js"></script>
 
  <script src="{{asset('website')}}/js/all.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('website')}}/js/main.js"></script>
  <script src="{{asset('admin')}}/js/sweetalert2.all.js"></script>
    <!-- fancybox JS File -->

  <script src="{{asset('admin')}}/js/toastr.min.js"></script>
  <script>
     @if(Session::has('success'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('success') }}");
            @endif
            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif
  </script>
  @stack('website-js')
</body>

</html>