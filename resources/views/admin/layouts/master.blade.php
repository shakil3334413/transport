<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title') | পরিবহন</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{asset('admin/img/favicon.png')}}" rel="shortcut icon">
    <link href="{{asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/batch-icons/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/dashicons/dashicons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/dripicons/webfont.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/eightyshades/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/entypo/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/feather/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('admin/icon_fonts_assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/icon_fonts_assets/foundation-icon-font/foundation-icons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/main.css?version=4.4.0')}}" rel="stylesheet">
   
    
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
      
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        @include('admin.partials.mobile-sidebar')
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        @include('admin.partials.sidebar')
        <!--------------------
        END - Main Menu
        -------------------->
        <div class="content-w">
          <!--------------------
          START - Top Bar
          -------------------->
          @include('admin.partials.topbar')
          <!--------------------
          END - Top Bar
          --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
          
          <!--------------------
          END - Breadcrumbs
          -------------------->
          {{-- <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div> --}}
          <!-- main content start -->
             @yield('content')
          <!-- main content end -->

        </div>
      </div>
      {{-- @include('admin.partials.footer') --}}
      <div class="display-type"></div>
    </div>
    @stack('js')
    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/moment/moment.js')}}"></script>
    <script src="{{asset('admin/bower_components/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap-validator/dist/validator.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{asset('admin/bower_components/editable-table/mindmup-editabletable.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>    
    <script src="{{asset('admin/bower_components/tether/dist/js/tether.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/util.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/alert.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/button.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/carousel.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/collapse.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/dropdown.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/modal.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/tab.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/tooltip.js')}}"></script>
    <script src="{{asset('admin/bower_components/bootstrap/js/dist/popover.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo_customizer.js?version=4.4.0')}}"></script>
    <script src="{{asset('admin/js/main.js?version=4.4.0')}}"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    
    {!! Toastr::message() !!}
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXX-9', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
