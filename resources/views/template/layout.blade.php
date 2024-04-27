<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PROJECT CASHIER </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/focus-2/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('admin') }}/focus-2/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/focus-2/vendor/owl-carousel/css/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.min.js"
        integrity="sha512-m+CXm5ZXGsw8CNy+DHQf8n3qpbIh/0d55dCh4xlLl7lLXsU1w0b4RL4gaxqlsOkJKqYMyHaAfUyHf2gRqf7AWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('admin') }}/focus-2/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('admin') }}/focus-2/css/style.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css"> --}}


    {{-- <style>
        *{
          text-decoration: none !important;
        }
    
        #myTable_wrapper {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
         }
     </style> --}}
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('admin') }}/focus-2/images/logo.png" alt="">
                <img class="logo-compact" src="{{ asset('admin') }}/focus-2/images/logo-text.png" alt="">
                {{-- <img class="brand-title" src="{{asset('admin')}}" alt=""> --}}
                <span class="brand-title ">Cafe Cashier</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                {{-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown"> --}}
                                {{-- <i class="mdi mdi-magnify"></i>
                                </span> --}}
                                <div class="dropdown-menu p-0 m-0">
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="/"><i class="fa-solid fa-home"></i><span class="nav-text">Dashboard</span></a>

                    </li>


                    @if(Auth::check() && Auth::user()->level == 1)
                        <li><a href="{{ url('category') }}"><i class="fa-solid fa-layer-group"></i><span
                                    class="nav-text">Category</span></a>
                        </li>

                        <li><a href="{{ url('register') }}"><i class="fa-solid fa-user"></i><span class="nav-text">User
                                    Manager</span></a>
                        </li>

                        {{-- <li><a href="{{ url('karyawan')}}"><i
                        class="icon icon-single-04"></i><span class="nav-text">Karyawan</span></a>
            </li> --}}

                        <li><a href="{{ url('jenis') }}"><i class="fa-solid fa-list"></i><span
                                    class="nav-text">Jenis</span></a>
                        </li>

                        <li><a href="{{ url('menu') }}"><i class="fa-solid fa-bell-concierge"></i><span
                                    class="nav-text">Menu</span></a>
                        </li>

                        <li><a href="{{ url('stok') }}"><i class="fa-solid fa-boxes-stacked"></i><span
                                    class="nav-text">Stok</span></a>
                        </li>

                        <li><a href="{{ url('pelanggan') }}"><i class="fa-solid fa-people-group"></i><span
                                    class="nav-text">Pelanggan</span></a>
                        </li>

                        <li><a href="{{ url('meja') }}"><i class="fa-solid fa-table"></i><span
                                    class="nav-text">Meja</span></a>
                        </li>



                        <li><a href="{{ url('tentang') }}"><i class="fa-solid fa-mobile"></i><span
                                    class="nav-text">Tentang Aplikasi</span></a>
                        </li>

                        {{-- <li><a href="{{ url('produk')}}"><i
    class="fa-solid fa-box"></i><span class="nav-text">Produk Titipan</span></a>
</li> --}}

                        <li><a href="{{ url('contact') }}"><i class="fa-solid fa-phone"></i><span
                                    class="nav-text">Contact Us</span></a>
                        </li>

                        <li><a href="{{ url('absensi') }}"><i class="fa-solid fa-fingerprint"></i><span
                                    class="nav-text">Absensi Kerja</span></a>
                        </li>
                    @endif

                    @if(Auth::check() && Auth::user()->level == 2)
                        <li><a href="{{ url('pemesanan') }}"><i class="fa-solid fa-money-bill"></i><span
                                    class="nav-text">Pemesanan</span></a>
                        </li>


                        <li><a href="{{ url('laporan') }}"><i class="fa-solid fa-book"></i><span
                                    class="nav-text">History Penjualan</span></a>
                        </li>
                    @endif

                    <li><a href="{{ route('logout') }}"><i class="fa-solid fa-power-off"></i><span
                                class="nav-text">Log Out</span></a>
                    </li>

            </div>


        </div>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
                <!-- /# column -->
            </div>
        </div>


        <!--**********************************
            Footer start
        ***********************************-->




        @include('template.footer')
