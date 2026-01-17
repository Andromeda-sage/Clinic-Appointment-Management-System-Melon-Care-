<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Melon Care Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_end/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin_end/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin_end/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin_end/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin_end/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">

   <!-- Full logo -->
<a class="sidebar-brand brand-logo" href="{{ route('index') }}"
   style="font-size:24px; font-weight:700; color:#4da6ff; text-decoration:none;">
    <i class="mdi mdi-hospital-building mr-2" style="color:#80c1ff;"></i> Melon Care
</a>

<!-- Mini logo (collapsed sidebar) -->
<a class="sidebar-brand brand-logo-mini" href="{{ route('index') }}"
   style="font-size:18px; font-weight:700; color:#4da6ff; text-decoration:none;">
    MC
</a>


  </div>

<ul class="nav">

  <!-- 🌸 MAIN NAVIGATION -->
  <li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#mainNav" aria-expanded="true">
      <span class="menu-icon">
        <i class="mdi mdi-home-heart"></i>
      </span>
      <span class="menu-title">Main</span>
      <i class="menu-arrow"></i>
    </a>

    <div class="collapse show" id="mainNav">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('index') }}">
            🏠 Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            📊 Dashboard
          </a>
        </li>
      </ul>
    </div>
  </li>

  <!-- 🛡️ ADMIN PAGES -->
  <li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#adminPages">
      <span class="menu-icon">
        <i class="mdi mdi-security"></i>
      </span>
      <span class="menu-title">Admin Pages</span>
      <i class="menu-arrow"></i>
    </a>

    <div class="collapse" id="adminPages">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_doctors') }}">
            👩‍⚕️ Add Doctors
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('view_doctors') }}">
            👨‍⚕️ View Doctors
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_patient') }}">
            🧑‍🦽 Add Patient
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('view_patients') }}">
            📋 View Patients
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('request') }}">
            🔔 Patient Requests
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('view_appointment') }}">
            📅 Appointments
          </a>
        </li>
      </ul>
    </div>
  </li>

</ul>

</nav>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin_end/assets/images/newminilogo.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">

              <li class="nav-item dropdown">
  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
    <div class="navbar-profile d-flex align-items-center">
      <img class="img-xs rounded-circle mr-2"
           src="admin_end/assets/images/faces/face3.jpg" alt="">
      <p class="mb-0 d-none d-sm-block navbar-profile-name mr-1">Anna</p>
      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
    </div>
  </a>

  <div class="dropdown-menu dropdown-menu-right navbar-dropdown">
    <!-- Profile header -->
    <div class="dropdown-header text-center">
      <img class="img-sm rounded-circle mb-2"
           src="admin_end/assets/images/faces/face3.jpg" alt="">
      <p class="mb-0 font-weight-bold">Anna</p>
      <small class="text-muted">Administrator</small>
    </div>

    <div class="dropdown-divider"></div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="px-3">
      @csrf
      <button type="submit" class="btn btn-danger btn-block">
        Log Out
      </button>
    </form>
  </div>
</li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

      

<div class="main-panel">
    <div class="content-wrapper" style="padding-top: 80px;"> <!-- adjust as needed -->
        @yield('dashboard_home')
        @yield('add_doctors')
        @yield('view_doctors')
        @yield('view_appointments')
        @yield('view_patients')
        @yield('add_patient')
        @yield('content')

    </div>
</div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin_end/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin_end/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin_end/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin_end/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin_end/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin_end/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin_end/assets/js/off-canvas.js"></script>
    <script src="admin_end/assets/js/hoverable-collapse.js"></script>
    <script src="admin_end/assets/js/misc.js"></script>
    <script src="admin_end/assets/js/settings.js"></script>
    <script src="admin_end/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin_end/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>