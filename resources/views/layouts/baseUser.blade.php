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
    <!-- Anti-flicker snippet (recommended)  -->


    <style>
        .async-hide {
            opacity: 0 !important
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            /* text-align: center; */
        }

    </style>
    <script>
        (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
        })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
        });
    </script>
    <!-- Analytics-Optimize Snippet -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
        });
        ga('set', 'anonymizeIp', true);
        ga('require', 'GTM-K9BGS8K');
        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
    </script>
    <!-- end Analytics-Optimize Snippet -->

</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg py-3" data-scroll="true" id="navbar">

            <a href="/" class="text-white  pl-3">
                <img src="/assets/img/logos/sppeps.png" class="pr-3" alt="" width="150">
                <br>
                <h5 class="text-white">Sistem Percetakan Permit Ejen Pemilikan Semula</h5>
            </a>

            <ul class="navbar-nav navbar-nav-hover mx-auto d-flex align-items-center">

                @can('isPemohon')
                    <li class="nav-item mx-2">
                        <a role="button" href="/dashboard"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font_color"
                            aria-expanded="false">
                            {{-- {{ __('landing.semakan_status_eps') }} --}}
                            Permohonan
                        </a>
                    </li>
                @endcan
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a role="button"
                        class="nav-link font_color ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('landing.arkib') }}&ensp;
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation dropdown-lg mt-0 mt-lg-3 p-3 border-radius-lg">
                        <div class="d-none d-lg-block">
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
                                                <!-- <span class="text-sm">All about overview, quick start, license and contents</span> -->
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

            @can ('isPemohon')
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
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


                                            <!-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                this.closest('form').submit();"> -->
                                            {{ __('Log Out') }}
                                            <!-- </x-dropdown-link> -->

                                            <!-- <span class="d-sm-inline d-none text-dark">Log Keluar</span> -->
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
                        <a href="/login_" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1 font_color"></i>
                            <span class="d-sm-inline d-none font_color">

                                {{ __('landing.log_masuk') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center ps-3 d-flex">
                        <a href="/semak-ic" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1 font_color"></i>
                            <span class="d-sm-inline d-none font_color">

                                {{ __('landing.daftar_akaun') }}
                            </span>
                        </a>
                    </li>
                </ul>
            @endcan



        </nav>
        <!-- End Navbar -->

        @yield('content')

        <footer class="footer pt-3" id="footer">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">

                            <p class="font_color">
                                Kementerian Perdagangan Dalam Negeri Hal Ehwal Pengguna
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
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
                    {{-- <p>See our dashboard options.</p> --}}
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


</body>

</html>
