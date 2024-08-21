<header id="page-topbar" style="background-color: #110e22;">
    <div class="navbar-header">
        <div class="d-flex" >
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background-color: #110e22;">
            <a href="{{ route('admin.home') }}" class="logo logo-dark">
                <img src="{{ asset('assets/images/logo_light.svg') }}" alt="" width="30%">
            </a>
                <a href="{{ route('admin.home') }}" class="logo logo-light">
                    <span class="logo-sm text-white">
                        <img src="{{ asset('assets/images/logo_light.svg') }}" alt="" width="30%">
                    </span>
                    <span class="logo-lg text-white">
                        <img src="{{ asset('assets/images/logo_light.svg') }}" alt="" width="50%">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>


        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
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

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background-color: #110e22;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.home') }}" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.rates') }}" class=" waves-effect">
                        <i class="bx bx-purchase-tag"></i>
                        <span key="t-dashboards">Rates</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.banks') }}" class=" waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-dashboards">Bank Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.crypto.index') }}" class=" waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span key="t-dashboards">Manage Cryptocurrencies</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.giftcard.index') }}" class=" waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span key="t-dashboards">Manage Gift Cards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.currency.index') }}" class=" waves-effect">
                        <i class="bx bx-dollar"></i>
                        <span key="t-dashboards">Manage Currency</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class=" waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-dashboards">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home') }}" class=" waves-effect">
                        <i class="bx bx-copy-alt"></i>
                        <span key="t-dashboards">Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tickets.index') }}" class=" waves-effect">

                        <i class="bx bx-chat"></i>
                        <span key="t-dashboards">Tickets</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class=" waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-dashboards">Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class=" waves-effect">
                        <i class="bx bx-power-off"></i>
                        <span key="t-dashboards">Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
