<header id="page-topbar" >
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('home/assets/images/logo/logo_round.png') }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('home/assets/images/logo/logo.png') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('home/assets/images/logo/logo_round_light.png') }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('home/assets/images/logo/logo_light.png') }}" alt=" " height="20">
                    </span>
                </a>
            </div>

        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
           

        </div>
    </div>
</header>

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a class=" waves-effect" href="{{ route('dashboard') }}">
                        <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Home</span>
                    </a>
                </li>
                <li>
                    <a class=" waves-effect" href="{{ route('transactions.index') }}">
                        <i class="bx bx-transfer me-2"></i><span key="t-dashboards">Transactions</span>
                    </a>
                </li>
                <li>
                    <a class=" waves-effect" href="{{ route('ticket.index') }}">
                        <i class="bx bx bx-task me-2"></i><span key="t-dashboards">Tickets</span>
                    </a>
                </li>
                
                {{-- <li>
                    <a class=" waves-effect" href="{{ route('profile.refer') }}">
                        <i class="bx bx-file me-2"></i><span key="t-dashboards">Refer & Earn</span>
                    </a>
                </li> --}}
                <li>
                    <a class=" waves-effect" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user me-2"></i><span key="t-dashboards">Profile</span>
                    </a>
                </li>
                <li>
                    <a class=" waves-effect" href="{{ route('logout') }}">
                        <i class="bx bx-power-off me-2"></i><span key="t-dashboards">Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>