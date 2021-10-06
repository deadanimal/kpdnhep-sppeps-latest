<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.3
=========================================================
* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-pro
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim
=========================================================
* The above copyr
ight notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        SPPEPS
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, soft ui dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
    <meta name="description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Soft UI Dashboard PRO by Creative Tim">
    <meta name="twitter:description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/487/thumb/opt_sdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Soft UI Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url"
        content="https://demos.creative-tim.com/soft-ui-dashboard-pro/pages/dashboards/default.html" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/487/thumb/opt_sdp_thumbnail.jpg" />
    <meta property="og:description"
        content="Soft UI Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.min.css?v=1.0.3" rel="stylesheet" />

    <link id="pagestyle"
        href="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/css/soft-design-system-pro.min.css?v=1.0.8"
        rel="stylesheet" />
    <!-- Anti-flicker snippet (recommended)  -->

    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .async-hide {
            opacity: 0 !important
        }

        .footer {
            /* position: fixed; */
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .content {
            padding: 0px;
            /* padding-bottom: 300px; */
            height: 100vh;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>


</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


        {{-- <header class="header" id="navbar">
            <nav class="navbar">
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                
                <a href="/" class="nav-logo text-white text-start pl-3">
                    <img src="/assets/img/logos/sppeps.png" class="pr-3" alt="" width="150">
                    <br>
                    <h5 class="text-white">Sistem Percetakan Permit Ejen Pemilikan Semula</h5>
                </a>


                <ul class="nav-menu">
                    
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">

                            Flags
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Deutsch
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    English(UK)
                                </a>
                            </li>
                        </ul>
                    </li>

                    @can('isPemohon')
                        <li class="nav-item mx-2">
                            <a role="button" href="/dashboard"
                                class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color dark"
                                aria-expanded="false">
                                {{ __('landing.permohonan') }}

                            </a>
                        </li>
                    @endcan
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a role="button"
                            class="nav-link font_color ps-2 d-flex justify-content-between cursor-pointer align-items-center dark"
                            id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('landing.arkib') }}&ensp;
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu  mt-0 mt-lg-3 border-radius-lg">
                            <div class="d-none d-sm-block">
                                <ul class="list-group">
                                    <li class="nav-item list-group-item border-0 p-0">
                                        <a class="dropdown-item py-2 border-radius-md" href="/arkib-bergambar">
                                            <div class="d-flex">
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        <i class="fas fa-rocket mr-2 text-secondary"></i> &nbsp;
                                                        {{ __('landing.arkib_bergambar') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item list-group-item border-0 p-0">
                                        <a class="dropdown-item py-2 border-radius-md" href="/arkib-dokumen">
                                            <div class="d-flex">
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        <i class="fas fa-book text-secondary"></i> &nbsp;
                                                        {{ __('landing.arkib_dokumen') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <a role="button" href="/semakan-status-eps"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color dark"
                            aria-expanded="false">
                            {{ __('landing.semakan_status_eps') }}
                        </a>
                    </li>

                    <li class="nav-item mx-2">
                        <a role="button" href="/faq"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color dark"
                            aria-expanded="false">
                            {{ __('landing.faq') }}
                        </a>
                    </li>

                    <li>
                        @can('isPemohon')

                            <ul class="navbar-nav  justify-content-end">
                                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0 dark" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="d-sm-inline d-none text-white">{{ __('landing.selamat_datang') }}
                                            {{ Auth::user()->name }}</span>
                                        <i class="fa fa-user me-sm-1 text-white p-2"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md dark" href="/profil">
                                                <div class="d-flex py-1">
                                                    <span
                                                        class="d-sm-inline d-none text-dark">{{ __('landing.profil') }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md dark" href="/tukar_kata_laluan">
                                                <div class="d-flex py-1">
                                                    <span
                                                        class="d-sm-inline d-none text-dark">{{ __('landing.tukar_kata_laluan') }}</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <a class="dropdown-item border-radius-md dark" href="#"
                                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                this.closest('form').submit();">
                                                    <div class="d-flex py-1">

                                                        {{ __('Log Out') }}

                                                    </div>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav  justify-content-end">
                                <li class="nav-item d-flex align-items-center ">
                                    <a href="/login_" class="nav-link text-body font-weight-bold px-0 dark">
                                        <i class="fa fa-user me-sm-1 font_color"></i>
                                        <span class="d-sm-inline d-none font_color">

                                            {{ __('landing.log_masuk') }}
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item d-flex align-items-center ps-3 d-flex">
                                    <a href="/semak-ic" class="nav-link text-body font-weight-bold px-0 dark">
                                        <i class="fa fa-user me-sm-1 font_color"></i>
                                        <span class="d-sm-inline d-none font_color">

                                            {{ __('landing.daftar_akaun') }}
                                        </span>
                                    </a>
                                </li>
                            </ul>

                        @endcan
                    </li>
                </ul>



            </nav>
        </header> --}}

        <!-- Navbar -->

        <nav class="navbar navbar-expand-lg " data-scroll="true" id="navbar" >

            <a href="/" class="text-white text-start pl-3  font-weight-bolder ms-sm-3">
                <img src="/assets/img/logos/sppeps.png" class="pr-3" alt="" width="150">
                <br>
                <h5 class="text-white">Sistem Percetakan Permit Ejen Pemilikan Semula</h5>
            </a>

            {{-- <a href="https://www.creative-tim.com/product/soft-ui-design-system-pro#pricingCard"
                class="btn btn-sm  bg-gradient-primary  btn-round mb-0 ms-auto d-lg-none d-block">Buy Now</a> --}}

            <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2 ">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 " id="navigation">
                <ul class="navbar-nav navbar-nav-hover mx-auto ">

                    @can('isPemohon')
                        <li class="nav-item mx-2">
                            <a role="button" href="/dashboard"
                                class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                                aria-expanded="false">
                                {{ __('landing.permohonan') }}

                            </a>
                        </li>
                    @endcan
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a role="button"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                            id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('landing.arkib') }}
                            <img src="./assets/img/down-arrow-white.svg" alt="down-arrow" class="arrow ms-1">
                        </a>
                        <div class="dropdown-menu dropdown-menu-animation dropdown-md mt-0 mt-lg-3 p-3 border-radius-lg" style="overflow: visible"
                            aria-labelledby="dropdownMenuDocs">
                            <div class="d-none d-lg-block">
                                <ul class="list-group">

                                    <li class="nav-item list-group-item border-0 p-0">
                                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="/arkib-dokumen">
                                            <div class="d-flex">
                                                <div class="icon h-10 me-3 d-flex mt-1">
                                                    <svg class="text-secondary" width="16px" height="16px"
                                                        viewBox="0 0 40 44" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>switches</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-1870.000000, -440.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(154.000000, 149.000000)">
                                                                        <path class="color-background"
                                                                            d="M10,20 L30,20 C35.4545455,20 40,15.4545455 40,10 C40,4.54545455 35.4545455,0 30,0 L10,0 C4.54545455,0 0,4.54545455 0,10 C0,15.4545455 4.54545455,20 10,20 Z M10,3.63636364 C13.4545455,3.63636364 16.3636364,6.54545455 16.3636364,10 C16.3636364,13.4545455 13.4545455,16.3636364 10,16.3636364 C6.54545455,16.3636364 3.63636364,13.4545455 3.63636364,10 C3.63636364,6.54545455 6.54545455,3.63636364 10,3.63636364 Z"
                                                                            opacity="0.6"></path>
                                                                        <path class="color-background"
                                                                            d="M30,23.6363636 L10,23.6363636 C4.54545455,23.6363636 0,28.1818182 0,33.6363636 C0,39.0909091 4.54545455,43.6363636 10,43.6363636 L30,43.6363636 C35.4545455,43.6363636 40,39.0909091 40,33.6363636 C40,28.1818182 35.4545455,23.6363636 30,23.6363636 Z M30,40 C26.5454545,40 23.6363636,37.0909091 23.6363636,33.6363636 C23.6363636,30.1818182 26.5454545,27.2727273 30,27.2727273 C33.4545455,27.2727273 36.3636364,30.1818182 36.3636364,33.6363636 C36.3636364,37.0909091 33.4545455,40 30,40 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        {{ __('landing.arkib_dokumen') }}</h6>

                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item list-group-item border-0 p-0">
                                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="/arkib-bergambar">
                                            <div class="d-flex">
                                                <div class="icon h-10 me-3 d-flex mt-1">
                                                    <svg class="text-secondary" width="16px" height="16px"
                                                        viewBox="0 0 40 40" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>settings</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2020.000000, -442.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(304.000000, 151.000000)">
                                                                        <polygon class="color-background"
                                                                            opacity="0.596981957"
                                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                                        </polygon>
                                                                        <path class="color-background"
                                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                            opacity="0.596981957"></path>
                                                                        <path class="color-background"
                                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        {{ __('landing.arkib_bergambar') }}</h6>
                                                    {{-- <span class="text-sm">For those who want flexibility, use our
                                                        utility classes</span> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row d-lg-none bg-white">
                                <div class="col-md-12 g-0">
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/arkib-dokumen">
                                        <div class="d-flex">
                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                <svg class="text-secondary" width="16px" height="16px"
                                                    viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>switches</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-1870.000000, -440.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(154.000000, 149.000000)">
                                                                    <path class="color-background"
                                                                        d="M10,20 L30,20 C35.4545455,20 40,15.4545455 40,10 C40,4.54545455 35.4545455,0 30,0 L10,0 C4.54545455,0 0,4.54545455 0,10 C0,15.4545455 4.54545455,20 10,20 Z M10,3.63636364 C13.4545455,3.63636364 16.3636364,6.54545455 16.3636364,10 C16.3636364,13.4545455 13.4545455,16.3636364 10,16.3636364 C6.54545455,16.3636364 3.63636364,13.4545455 3.63636364,10 C3.63636364,6.54545455 6.54545455,3.63636364 10,3.63636364 Z"
                                                                        opacity="0.6"></path>
                                                                    <path class="color-background"
                                                                        d="M30,23.6363636 L10,23.6363636 C4.54545455,23.6363636 0,28.1818182 0,33.6363636 C0,39.0909091 4.54545455,43.6363636 10,43.6363636 L30,43.6363636 C35.4545455,43.6363636 40,39.0909091 40,33.6363636 C40,28.1818182 35.4545455,23.6363636 30,23.6363636 Z M30,40 C26.5454545,40 23.6363636,37.0909091 23.6363636,33.6363636 C23.6363636,30.1818182 26.5454545,27.2727273 30,27.2727273 C33.4545455,27.2727273 36.3636364,30.1818182 36.3636364,33.6363636 C36.3636364,37.0909091 33.4545455,40 30,40 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6
                                                    class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                    {{ __('landing.arkib_dokumen') }}</h6>

                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="/arkib-bergambar">
                                        <div class="d-flex">
                                            <div class="icon h-10 me-3 d-flex mt-1">
                                                <svg class="text-secondary" width="16px" height="16px"
                                                    viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>settings</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2020.000000, -442.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(304.000000, 151.000000)">
                                                                    <polygon class="color-background"
                                                                        opacity="0.596981957"
                                                                        points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                                    </polygon>
                                                                    <path class="color-background"
                                                                        d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                        opacity="0.596981957"></path>
                                                                    <path class="color-background"
                                                                        d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div>
                                                <h6
                                                    class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                    {{ __('landing.arkib_bergambar') }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item mx-2">
                        <a role="button" href="/semakan-status-eps"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                            aria-expanded="false">
                            {{ __('landing.semakan_status_eps') }}
                        </a>
                    </li>

                    <li class="nav-item mx-2">
                        <a role="button" href="/faq"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                            aria-expanded="false">
                            {{ __('landing.faq') }}
                        </a>
                    </li>

                </ul>


                @can('isPemohon')
                    <ul class="navbar-nav mx-auto">


                        <li class="nav-item dropdown dropdown-hover mx-2">
                            <a role="button"
                                class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('landing.selamat_datang') }}
                                {{ Auth::user()->name }}
                                <i class="fa fa-user me-sm-1 text-white p-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animation dropdown mt-0 mt-lg-3 p-3 border-radius-lg"
                                aria-labelledby="dropdownMenuButton">
                                <div class="d-none d-lg-block">
                                    <ul class="list-group">

                                        <li class="nav-item list-group-item border-0 p-0">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md" href="/profil">
                                                <div class="d-flex">
                                                    <div>
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            {{ __('landing.profil') }}</h6>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item list-group-item border-0 p-0">
                                            <a class="dropdown-item py-2 ps-3 border-radius-md" href="/tukar_kata_laluan">
                                                <div class="d-flex">
                                                    <div>
                                                        <h6
                                                            class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                            {{ __('landing.tukar_kata_laluan') }}</h6>
                                                        {{-- <span class="text-sm">For those who want flexibility, use our
                                                            utility classes</span> --}}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item list-group-item border-0 p-0">
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <a class="dropdown-item border-radius-md" href="#"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <div class="d-flex py-1">

                                                        {{ __('Log Keluar') }}

                                                    </div>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row d-lg-none bg-white">
                                    <div class="col-md-12 g-0">
                                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="/profil">
                                            <div class="d-flex">
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        {{ __('landing.profil') }}</h6>

                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 ps-3 border-radius-md" href="/tukar_kata_laluan">
                                            <div class="d-flex">
                                                <div>
                                                    <h6
                                                        class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">
                                                        {{ __('landing.tukar_kata_laluan') }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item py-2 ps-3 border-radius-md">
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <a class="dropdown-item border-radius-md" href="#"
                                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                    this.closest('form').submit();">
                                                    <div class="d-flex py-1">

                                                        {{ __('Log Keluar') }}

                                                    </div>
                                                </a>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>


                        {{-- <li class="nav-item dropdown dropdown-hover mx-2">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-sm-inline d-none text-white">{{ __('landing.selamat_datang') }}
                                    {{ Auth::user()->name }}</span>
                                <i class="fa fa-user me-sm-1 text-white p-2"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="/profil">
                                        <div class="d-flex py-1">
                                            <span class="d-sm-inline d-none text-dark">{{ __('landing.profil') }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="/tukar_kata_laluan">
                                        <div class="d-flex py-1">
                                            <span
                                                class="d-sm-inline d-none text-dark">{{ __('landing.tukar_kata_laluan') }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <a class="dropdown-item border-radius-md" href="#"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                    this.closest('form').submit();">
                                            <div class="d-flex py-1">

                                                {{ __('Log Keluar') }}

                                            </div>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                @else
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-2">
                            <a href="/login_" class="nav-link ps-2 d-flex cursor-pointer align-items-center font_color">
                                <i class="fa fa-user me-sm-1 font_color"></i>


                                {{ __('landing.log_masuk') }}

                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="/semak-ic" class="nav-link ps-2 d-flex cursor-pointer align-items-center font_color">
                                <i class="fa fa-user me-sm-1 font_color"></i>


                                {{ __('landing.daftar_akaun') }}

                            </a>
                        </li>
                    </ul>
                @endcan
            </div>

        </nav>
        <!-- End Navbar -->


        <div class="container-fluid content">
            @yield('content')
        </div>


        <footer class="footer pt-3" id="footer">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">

                    <div class="col-md-1 col-xs-2 mb-lg-0 d-flex justify-content-center justify-content-xs-center ">
                        <p class="font_color"><img src="/assets/img/logos/jata_negara.png" height="70px" alt="">
                        </p>
                    </div>

                    <div class="col-md-5 col-xs-2 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">

                            <p class="font_color">
                                {{ __('landing.kementerian_perdagangan__') }}
                                <br>
                                No. 13, Persiaran Perdana, Presint 2,
                                <br>
                                62633 Putrajaya, Wilayah Persekutuan Putrajaya


                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-2 mb-lg-0 d-flex justify-content-md-end justify-content-xs-center">
                        <p class="font_color">@all rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-light position-fixed px-3 py-2" style="background-color: #cb0c9f">
            <i class="fab fa-accessible-icon"></i>
        </a>
        <div class="card shadow-lg blur">
            <div class="card-header pb-0 pt-3  bg-transparent ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">{{ __('landing.tetapan') }}</h5>

                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->

                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">{{ __('landing.tukar_bahasa') }}</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <a href="/ms" class="btn btn-sm">{{ __('landing.melayu') }}</a>
                    <a href="/en" class="btn btn-sm">{{ __('landing.english') }}</a>
                </div>

                <hr class="horizontal dark mb-1">

                <div>
                    <h6 class="mb-0">{{ __('landing.saiz_tulisan') }}</h6>
                </div>
                <div class="my-2 text-start">
                    <a href="/font_size_normal" class="btn btn-sm">normal</a>
                    <a href="/font_size_0_9" class="btn btn-sm">0.9</a>
                    <a href="/font_size_1" class="btn btn-sm">1</a>
                    <a href="/font_size_1_1" class="btn btn-sm">1.1</a>
                    <a href="/font_size_1_2" class="btn btn-sm">1.2</a>
                    <a href="/font_size_1_3" class="btn btn-sm">1.3</a>
                </div>

                <hr class="horizontal dark mb-1">

                <div>
                    <h6 class="mb-0">{{ __('landing.warna_tema') }}</h6>
                </div>
                <div class="badge-colors my-2 text-start">
                    <a href="/default" class="badge filter " style="background: rgb(42,55,125);
                    background: linear-gradient(90deg, rgba(42,55,125,1) 41%, rgba(108,40,183,1) 68%);"></a>
                    <a href="/blue" class="badge filter " style="background-color: #1d1da1"></a>
                    <a href="/black" class="badge filter " style="background-color: black"></a>
                    <a href="/brown" class="badge filter " style="background-color: #c9612f"></a>
                </div>

                <hr class="horizontal dark mb-1">

                <div>
                    <h6 class="mb-0">{{ __('landing.warna_tulisan') }}</h6>
                </div>
                <div class="badge-colors my-2 text-start">
                    <a href="/font_default" class="badge filter " style="background: rgb(42,55,125);
                    background: linear-gradient(90deg, rgba(42,55,125,1) 41%, rgba(108,40,183,1) 68%);"></a>
                    <a href="/font_blue" class="badge filter " style="background-color: #1d1da1"></a>
                    <a href="/font_brown" class="badge filter " style="background-color: #c9612f"></a>
                    <a href="/font_green" class="badge filter " style="background-color: #20ca20"></a>
                </div>

                <hr class="horizontal dark mb-1">

                <div class="badge-colors my-2 text-start">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="readable" @if (Session::get('readable') == 'true') checked @endif>
                        <label class="form-check-label"
                            for="readable">{{ __('landing.font_yang_boleh_dibaca') }}</label>
                    </div>

                </div>

                <hr class="horizontal dark mb-1">

                <div class="badge-colors my-2 text-start">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="grayscale" @if (Session::get('grayscale') == 'true') checked @endif>
                        <label class="form-check-label"
                            for="grayscale">{{ __('landing.gambar_skala_kelabu') }}</label>
                    </div>

                </div>

                <hr class="horizontal dark mb-1">

                <div class="badge-colors my-2 text-start">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="negative" @if (Session::get('negative') == 'true') checked @endif>
                        <label class="form-check-label" for="negative">{{ __('landing.warna_terbalik') }}</label>
                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <a href="/reset" class="btn btn-sm bg-gradient-danger">Reset</a>
                </div>

            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="../../assets/js/plugins/threejs.js"></script>
    <script src="../../assets/js/plugins/orbit-controls.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            var butaKe = '{!! Session::get('color') !!}';
            console.log(butaKe);
            if (butaKe === 'blue') {
                console.log('blue');
                $('#navbar').css('background-color', '#1d1da1');
                $('#footer').css('background-color', '#1d1da1');

                // $('#navbar').css('color', 'white');
            } else if (butaKe === 'black') {
                console.log('black');
                $('#navbar').css('background-color', 'black');
                $('#footer').css('background-color', 'black');
            } else if (butaKe === 'brown') {
                console.log('brown');
                $('#navbar').css('background-color', '#c9612f');
                $('#footer').css('background-color', '#c9612f');
            } else {
                console.log('default');
                $('#navbar').css('background', 'rgb(42,55,125);');
                $('#navbar').css('background',
                    'linear-gradient(90deg, rgba(42,55,125,1) 41%, rgba(108,40,183,1) 68%)');

                $('#footer').css('background-color', '#1d1da1');
            }
        });

        $(function() {
            var font_color = '{!! Session::get('font_color') !!}';
            console.log('font color', font_color);

            // elements = document.getElementsByClassName('font_color');
            // console.log('font color 2')
            if (font_color == 'blue') {

                console.log('blue');
                // $('font_color').css('color', '#1d1da1');
                $('p').css('color', '#1d1da1');
                $('span').css('color', '#1d1da1');
                $('a').css('color', '#1d1da1');

            } else if (font_color == 'brown') {

                console.log('brown');
                // $('#dropdownMenuDocs').css('color', '#c9612f');
                $('.font_color').css('color', '#c9612f');
                // $('#footer').css('color', 'black');
                $('p').css('color', '#c9612f');
                $('span').css('color', '#c9612f');
                $('a').css('color', '#c9612f');

            } else if (font_color == 'green') {

                console.log('green');
                // $('#dropdownMenuDocs').css('color', '#20ca20');
                $('.font_color').css('color', '#20ca20');
                $('p').css('color', '#20ca20');
                $('span').css('color', '#20ca20');
                $('a').css('color', '#20ca20');

            } else {
                console.log('normal');
                // $('#dropdownMenuDocs').css('color', 'white');
                $('.font_color').css('color', 'white');
            }
        });

        $(function() {
            var grayscale = '{!! Session::get('grayscale') !!}';
            console.log('grayscale', grayscale);

            if (grayscale == 'true') {

                console.log('gray');
                // $('#dropdownMenuDocs').css('color', '#1d1da1');
                $('body').css('filter', 'grayscale(100%)');

            }
        });

        $(function() {
            var negative = '{!! Session::get('negative') !!}';
            console.log('negative', negative);

            if (negative == 'true') {

                console.log('negative');
                // $('#dropdownMenuDocs').css('color', '#1d1da1');
                $('body').css('filter', 'invert(100%)');

            }
        });

        $(document).ready(function() {
            $("#grayscale").click(function() {
                if ($("#grayscale").is(":checked"))
                    window.location.href = '/set_grayscale';
                else
                    window.location.href = '/remove_grayscale';
            });
        });

        $(document).ready(function() {
            $("#negative").click(function() {
                if ($("#negative").is(":checked"))
                    window.location.href = '/set_negative';
                else
                    window.location.href = '/remove_negative';
            });
        });


        $(function() {
            var size = '{!! Session::get('size') !!}';
            console.log('size', size);

            if (size == '0.9') {
                $('p').css('font-size', '0.9rem');
                $('span').css('font-size', '0.9rem');
                $('a').css('font-size', '0.9rem');
            } else if (size == '1') {
                $('p').css('font-size', '1rem');
                $('span').css('font-size', '1rem');
                $('a').css('font-size', '1rem');
            } else if (size == '1.1') {
                $('p').css('font-size', '1.1rem');
                $('span').css('font-size', '1.1rem');
                $('a').css('font-size', '1.1rem');
            } else if (size == '1.2') {
                $('p').css('font-size', '1.2rem');
                $('span').css('font-size', '1.2rem');
                $('a').css('font-size', '1.2rem');
            } else if (size == '1.3') {
                $('p').css('font-size', '1.3rem');
                $('span').css('font-size', '1.3rem');
                $('a').css('font-size', '1.3rem');
            }
        });

        $(document).ready(function() {
            $("#readable").click(function() {
                if ($("#readable").is(":checked"))
                    window.location.href = '/set_readable';
                else
                    window.location.href = '/remove_readable';
            });
        });

        $(function() {
            var readable = '{!! Session::get('readable') !!}';
            console.log('readable', readable);

            if (readable == true) {
                // console.log('boleh baca');
                $('p').css('font-family', 'Helvetica');
                $('span').css('font-family', 'Helvetica');
                $('a').css('font-family', 'Helvetica');
            }
        });
    </script>

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        hamburger.addEventListener("click", mobileMenu);

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
            $('.dark').css('color', 'black');
        }
    </script>

    <script>
        const navLink = document.querySelectorAll(".nav-link");

        navLink.forEach(n => n.addEventListener("click", closeMenu));

        function closeMenu() {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
            $('.dark').css('color', 'white');
        }
    </script>

</body>

</html>
