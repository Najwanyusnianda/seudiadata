<html lang="en"
    class="wf-lato-n3-active wf-lato-n4-active wf-lato-n7-active wf-lato-n9-active wf-flaticon-n4-inactive wf-fontawesome5solid-n4-active wf-fontawesome5regular-n4-active wf-fontawesome5brands-n4-active wf-simplelineicons-n4-active wf-active sidebar-color">

<head>                  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seudia data</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <link rel="icon" href="#" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/atlantis/js/plugin/webfont/webfont.min.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
    <link rel="stylesheet" href="{{ asset('assets/atlantis/css/fonts.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('assets/chartJS/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/leafletJS/leaflet.css') }}">
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: ['{{ asset('assets/atlantis/css/fonts.min.css') }}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/atlantis/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/atlantis/css/atlantis.min.css') }}">


    <!-- CSS Just for demo purpose, don't include it in your project --> 
    <style>
        .logo-header .nav-toggle{
            top: 20 !important;
        }
    </style>
   @yield('styles')
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            @include('layout._navbar')
        </div>
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="white">

       @include('layout._sidebar')
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        @yield('page_header')
                       <!-- <h4 class="page-title">Tables</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Tables</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Basic Tables</a>
                            </li>
                        </ul>-->
                    </div>
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.themekita.com">
                                    BPS Aceh Barat Daya
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="https://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->

    <script src="{{ asset('assets/atlantis/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/atlantis/js/core/popper.min.js') }}"></script>  
    <script src="{{ asset('assets/atlantis/js/core/bootstrap.min.js') }}"></script>  


    <!-- jQuery UI -->
    <script src="{{ asset('assets/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script> 
    <script src="{{ asset('assets/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script> 

    <!-- jQuery Scrollbar -->
 
    <script src="{{ asset('assets/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script> 
    <!-- Atlantis JS -->
    <script src="{{ asset('assets/atlantis/js/atlantis.min.js') }}"></script> 
<script src="{{ asset('assets/chartJS/Chart.bundle.min.js') }}"></script>

<script src="{{ asset('assets/leafletJS/leaflet.js') }}"></script> 


    <div
        style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
        <div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
        </div>
    </div>


    @yield('scripts')
</body>

</html>