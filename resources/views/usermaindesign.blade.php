<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melon Care User</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_end/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin_end/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin_end/assets/css/style.css">
    <link rel="shortcut icon" href="admin_end/assets/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="{{ route('index') }}"
                   style="font-size:24px; font-weight:700; color:#4da6ff; text-decoration:none;">
                    <i class="mdi mdi-hospital-building mr-2" style="color:#80c1ff;"></i> Melon Care
                </a>
                <a class="sidebar-brand brand-logo-mini" href="{{ route('index') }}"
                   style="font-size:18px; font-weight:700; color:#4da6ff; text-decoration:none;">
                    MC
                </a>
            </div>

            <ul class="nav">
                <!-- Main Navigation -->
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#mainNav" aria-expanded="true">
                        <span class="menu-icon"><i class="mdi mdi-home-heart"></i></span>
                        <span class="menu-title">Main</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse show" id="mainNav">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('index') }}">🏠 Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">📊 Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- User Pages -->
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#userPages">
                        <span class="menu-icon"><i class="mdi mdi-account"></i></span>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="userPages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('userappointments') }}">📅 Appointments</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Body Wrapper -->
        <div class="container-fluid page-body-wrapper">
            <!-- Navbar -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="{{ route('index') }}">
                        <img src="admin_end/assets/images/newminilogo.png" alt="logo" />
                    </a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile d-flex align-items-center">
                                    <img class="img-xs rounded-circle mr-2" src="admin_end/assets/images/faces/face11.jpg" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name mr-1">{{ auth()->user()->name }}</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-sm rounded-circle mb-2" src="admin_end/assets/images/faces/face11.jpg" alt="">
                                    <p class="mb-0 font-weight-bold">{{ auth()->user()->name }}</p>
                                    <small class="text-muted">User</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" class="px-3">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-block">Log Out</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper" style="padding-top: 80px;">
                    @yield('content') <!-- Child pages will fill this -->
                </div>
            </div>
        </div>

    </div>

    <!-- Plugins JS -->
    <script src="admin_end/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin_end/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin_end/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin_end/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin_end/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin_end/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin_end/assets/js/off-canvas.js"></script>
    <script src="admin_end/assets/js/hoverable-collapse.js"></script>
    <script src="admin_end/assets/js/misc.js"></script>
    <script src="admin_end/assets/js/settings.js"></script>
    <script src="admin_end/assets/js/todolist.js"></script>
    <script src="admin_end/assets/js/dashboard.js"></script>
</body>
</html>
