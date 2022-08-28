
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        @stack('admin-css')
        <link href="{{asset('admin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('admin')}}/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('admin')}}/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{asset('admin')}}/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('admin')}}/css/toastr.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/css/custom.css">
       
        
    </head>

    <body>
        {!! Toastr::message() !!}
        <!-- Begin page -->
        <div id="wrapper">

            @include('partial.admin_header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('partial.admin_sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    @yield('admin-content')
                    

                </div> <!-- content -->

                @include('partial.admin_footer')

            </div>



        </div>
        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="{{asset('admin')}}/js/jquery.min.js"></script>
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> --}}
        <script src="{{asset('admin')}}/js/validate.min.js"></script>
        <script src="{{asset('admin')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('admin')}}/js/metisMenu.min.js"></script>
        <script src="{{asset('admin')}}/js/jquery.slimscroll.js"></script>
        <script src="{{asset('admin')}}/js/waves.min.js"></script>
        <script src="{{asset('admin')}}/js/all.min.js"></script>
        <!-- App js -->
        <script src="{{asset('admin')}}/js/app.js"></script>
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
    
          
    
            @if(Session::has('update'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('update') }}");
            @endif
    
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif
          
            @if(Session::has('remove'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('remove') }}");
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
        @stack('admin-js')

    </body>

</html>