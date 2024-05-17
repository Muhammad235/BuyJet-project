<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Flashpay User Panel" name="description" />
        <meta content="Flashpay" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('home/assets/images/logo/favicon.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"  rel="stylesheet" type="text/css" />
   

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/libs/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        <style>
            .bottom-navigation {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: var(--bs-footer-bg);
                overflow: hidden;
                z-index: 99999999;
            }
            
            .bottom-navigation a {
                float: left;
                width: 20%;
                text-align: center;
                padding: 15px 0;
                color: var(--bs-footer-color) ;
                text-decoration: none;
            }
            
            .bottom-navigation a:hover {
                background-color:var(--bs-footer-bg);
                color: var(--bs-footer-color) ;
            }
            
            .icon {
                display: block;
                margin: 0 auto;
                font-size: 24px;
            }
        </style>
    </head>
    
    <body data-sidebar="light" data-layout-mode="light" style="margin-top:20px"  onload="checkLocalStorage()">
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
        {{-- begin page --}}
        <div id="layout-wrapper" >

            @include('layouts.navigation')

            <!-- Page Content -->
            @yield('content')

        </div>
        {{-- end page --}}

        
        @include('layouts.appearance')


    <!-- JAVASCRIPT -->
    <div class="bottom-navigation">
        <a href="{{ route('dashboard') }}"><span class="icon bx bx-home-circle"></span> Home</a>
        <a href="{{ route('transactions.index') }}"><span class=" bx bx-transfer icon"></span> Transactions</a>
        <a href="{{ route('ticket.index') }}"><span class="bx bx-task icon"></span> Tickets</a>
        <a href="{{ route('profile.edit') }}"><span class="bx bx-user icon"></span> Profile</a>
        <a href="{{ route('logout') }}"><span class="bx bx-power-off icon"></span> Logout</a>
      </div>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    {{-- <script defer src="{{ asset('assets/js/app.js')}}"></script> --}}
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/form.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    
    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

    <script>
       document.addEventListener('DOMContentLoaded', () => {
        (function (a) {
            "use strict";
            var e,
                t = localStorage.getItem("language"),
                s = "en";
            function n(e) {
                document.getElementById("header-lang-img") &&
                    ("en" == e
                        ? (document.getElementById("header-lang-img").src = "assets/images/flags/us.jpg")
                        : "sp" == e
                        ? (document.getElementById("header-lang-img").src = "assets/images/flags/spain.jpg")
                        : "gr" == e
                        ? (document.getElementById("header-lang-img").src = "assets/images/flags/germany.jpg")
                        : "it" == e
                        ? (document.getElementById("header-lang-img").src = "assets/images/flags/italy.jpg")
                        : "ru" == e && (document.getElementById("header-lang-img").src = "assets/images/flags/russia.jpg"),
                    localStorage.setItem("language", e),
                    null == (t = localStorage.getItem("language")) && n(s),
                    a.getJSON("assets/lang/" + t + ".json", function (e) {
                        a("html").attr("lang", t),
                            a.each(e, function (e, t) {
                                "head" === e && a(document).attr("title", t.title), a("[key='" + e + "']").text(t);
                            });
                    }));
            }
            function c() {
                for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, a = e.length; t < a; t++)
                    "nav-item dropdown active" === e[t].parentElement.getAttribute("class") && (e[t].parentElement.classList.remove("active"), null !== e[t].nextElementSibling && e[t].nextElementSibling.classList.remove("show"));
            }
            function r(e) {
                1 == a("#light-mode-switch").prop("checked") && "light-mode-switch" === e
                    ? (a("html").removeAttr("dir"),
                    a("#dark-mode-switch").prop("checked", !1),
                    a("#rtl-mode-switch").prop("checked", !1),
                    a("#dark-rtl-mode-switch").prop("checked", !1),
                    a("#bootstrap-style").attr("href", "/assets/css/bootstrap.min.css"),
                    a("body").attr("data-layout-mode", "light"),
                    a('body').attr("data-sidebar", "light"),
                    a("#app-style").attr("href", "/assets/css/app.min.css"),
                    localStorage.setItem("is_visited", "light-mode-switch"))
                    : 1 == a("#dark-mode-switch").prop("checked") && "dark-mode-switch" === e
                    ? (a("html").removeAttr("dir"),
                    a("#light-mode-switch").prop("checked", !1),
                    a("#rtl-mode-switch").prop("checked", !1),
                    a("#dark-rtl-mode-switch").prop("checked", !1),
                    a("body").attr("data-layout-mode", "dark"),
                    a('body').attr("data-sidebar", "dark"),
                    localStorage.setItem("is_visited", "dark-mode-switch"))
                    : 1 == a("#rtl-mode-switch").prop("checked") && "rtl-mode-switch" === e
                    ? (a("#light-mode-switch").prop("checked", !1),
                    a("#dark-mode-switch").prop("checked", !1),
                    a("#dark-rtl-mode-switch").prop("checked", !1),
                    a("#bootstrap-style").attr("href", "/assets/css/bootstrap-rtl.min.css"),
                    a("#app-style").attr("href", "/assets/css/app-rtl.min.css"),
                    a("html").attr("dir", "rtl"),
                    a("body").attr("data-layout-mode", "light"),
                    localStorage.setItem("is_visited", "rtl-mode-switch"))
                    : 1 == a("#dark-rtl-mode-switch").prop("checked") &&
                    "dark-rtl-mode-switch" === e &&
                    (a("#light-mode-switch").prop("checked", !1),
                    a("#rtl-mode-switch").prop("checked", !1),
                    a("#dark-mode-switch").prop("checked", !1),
                    a("#bootstrap-style").attr("href", "/assets/css/bootstrap-rtl.min.css"),
                    a("#app-style").attr("href", "/assets/css/app-rtl.min.css"),
                    a("html").attr("dir", "rtl"),
                    a("body").attr("data-layout-mode", "dark"),
                    localStorage.setItem("is_visited", "dark-rtl-mode-switch"));
            }
            function o() {
                document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log("pressed"), a("body").removeClass("fullscreen-enable"));
            }
            a("#side-menu").metisMenu(),
                a("#vertical-menu-btn").on("click", function (e) {
                    e.preventDefault(), a("body").toggleClass("sidebar-enable"), 992 <= a(window).width() ? a("body").toggleClass("vertical-collpsed") : a("body").removeClass("vertical-collpsed");
                }),
                a("#sidebar-menu a").each(function () {
                    var e = window.location.href.split(/[?#]/)[0];
                    this.href == e &&
                        (a(this).addClass("active"),
                        a(this).parent().addClass("mm-active"),
                        a(this).parent().parent().addClass("mm-show"),
                        a(this).parent().parent().prev().addClass("mm-active"),
                        a(this).parent().parent().parent().addClass("mm-active"),
                        a(this).parent().parent().parent().parent().addClass("mm-show"),
                        a(this).parent().parent().parent().parent().parent().addClass("mm-active"));
                }),
                a(document).ready(function () {
                    var e;
                    0 < a("#sidebar-menu").length &&
                        0 < a("#sidebar-menu .mm-active .active").length &&
                        300 < (e = a("#sidebar-menu .mm-active .active").offset().top) &&
                        ((e -= 300), a(".vertical-menu .simplebar-content-wrapper").animate({ scrollTop: e }, "slow"));
                }),
                a(".navbar-nav a").each(function () {
                    var e = window.location.href.split(/[?#]/)[0];
                    this.href == e &&
                        (a(this).addClass("active"),
                        a(this).parent().addClass("active"),
                        a(this).parent().parent().addClass("active"),
                        a(this).parent().parent().parent().addClass("active"),
                        a(this).parent().parent().parent().parent().addClass("active"),
                        a(this).parent().parent().parent().parent().parent().addClass("active"),
                        a(this).parent().parent().parent().parent().parent().parent().addClass("active"));
                }),
                a('[data-bs-toggle="fullscreen"]').on("click", function (e) {
                    e.preventDefault(),
                        a("body").toggleClass("fullscreen-enable"),
                        document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement
                            ? document.cancelFullScreen
                                ? document.cancelFullScreen()
                                : document.mozCancelFullScreen
                                ? document.mozCancelFullScreen()
                                : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
                            : document.documentElement.requestFullscreen
                            ? document.documentElement.requestFullscreen()
                            : document.documentElement.mozRequestFullScreen
                            ? document.documentElement.mozRequestFullScreen()
                            : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }),
                document.addEventListener("fullscreenchange", o),
                document.addEventListener("webkitfullscreenchange", o),
                document.addEventListener("mozfullscreenchange", o),
                a(".right-bar-toggle").on("click", function (e) {
                    a("body").toggleClass("right-bar-enabled");
                }),
                a(document).on("click", "body", function (e) {
                    0 < a(e.target).closest(".right-bar-toggle, .right-bar").length || a("body").removeClass("right-bar-enabled");
                }),
                (function () {
                    if (document.getElementById("topnav-menu-content")) {
                        for (var e = document.getElementById("topnav-menu-content").getElementsByTagName("a"), t = 0, a = e.length; t < a; t++)
                            e[t].onclick = function (e) {
                                "#" === e.target.getAttribute("href") && (e.target.parentElement.classList.toggle("active"), e.target.nextElementSibling.classList.toggle("show"));
                            };
                        window.addEventListener("resize", c);
                    }
                })(),
                [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (e) {
                    return new bootstrap.Tooltip(e);
                }),
                [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (e) {
                    return new bootstrap.Popover(e);
                }),
                [].slice.call(document.querySelectorAll(".offcanvas")).map(function (e) {
                    return new bootstrap.Offcanvas(e);
                }),
                
                a("#password-addon").on("click", function () {
                    0 < a(this).siblings("input").length && ("password" == a(this).siblings("input").attr("type") ? a(this).siblings("input").attr("type", "input") : a(this).siblings("input").attr("type", "password"));
                }),
                null != t && t !== s && n(t),
                a(".language").on("click", function (e) {
                    n(a(this).attr("data-lang"));
                }),
                $(window).on("load", function() {
                    $("#status").fadeOut();
                    $("#preloader").delay(350).fadeOut("slow");
            
                    Waves.init(),
                    a("#checkAll").on("change", function () {
                        a(".table-check .form-check-input").prop("checked", a(this).prop("checked"));
                    }),
                    a(".table-check .form-check-input").change(function () {
                        a(".table-check .form-check-input:checked").length == a(".table-check .form-check-input").length ? a("#checkAll").prop("checked", !0) : a("#checkAll").prop("checked", !1);
                    });
                
                    // if (window.localStorage) {
                    //     let storedMode = localStorage.getItem("is_visited");
                
                    //     if (storedMode) {
                    //         // A mode is stored in localStorage
                    //         $(".right-bar input:checkbox").prop("checked", false);
                    //         $("#" + storedMode).prop("checked", true);
                    //         r(storedMode);
                    //     } else {
                    //         // No mode stored, set default based on conditions
                    //         let defaultMode;
                
                    //         if ($("body").attr("data-layout-mode") === "dark") {
                    //             defaultMode = "dark-mode-switch";
                    //         } else {
                    //             defaultMode = "light-mode-switch";
                    //         }
                
                    //         $("#" + defaultMode).prop("checked", true);
                    //         localStorage.setItem("is_visited", defaultMode);
                    //         r(defaultMode);
                    //     }
                    // }
                
                    if ($("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch").length > 0) {
                        $("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch, #dark-rtl-mode-switch").on("change", function (e) {
                            r(e.target.id);
                        });
                    } else {
                        console.error("One or more elements not found. Check IDs and element existence.");
                    }
                });
            
        })(jQuery);
       })

       function checkLocalStorage() {
           let storedMode = localStorage.getItem("is_visited");
            if (storedMode === 'light-mode-switch') {
                document.getElementsByTagName('body')[0].setAttribute('data-layout-mode', 'light');
                document.getElementsByTagName('body')[0].setAttribute('data-sidebar', 'light');
                document.getElementById('light-mode-switch').checked = true;
                document.getElementById('dark-mode-switch').checked = false;
            } else{
                document.getElementsByTagName('body')[0].setAttribute('data-layout-mode', 'dark');
                document.getElementsByTagName('body')[0].setAttribute('data-sidebar', 'dark');
                document.getElementById('light-mode-switch').checked = false;
                document.getElementById('dark-mode-switch').checked = true;
            }

        //    get window width
        let windowWidth = window.innerWidth;
        if(windowWidth <380)
        {   
            document.querySelector('.navbar-brand-box').style.display ="block"
        }
       }
    </script>
    </body>
</html>

