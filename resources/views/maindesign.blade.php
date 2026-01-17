<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Melon Care - Medical Center</title>

  <link rel="stylesheet" href="front_end/assets/css/maicons.css">

  <link rel="stylesheet" href="front_end/assets/css/bootstrap.css">

  <link rel="stylesheet" href="front_end/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="front_end/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="front_end/assets/css/theme.css">
  <style>
    /* Theme colors */
    body {
      background-color: #f8f9fa;
      color: #0d3b66;
    }

    a, .nav-link {
      color: #ffffff;
    }

    a:hover, .nav-link:hover {
      color: #4da6ff;
    }

    .navbar {
      background-color: #0d3b66 !important;
    }

    .navbar-brand span {
      color: #4da6ff !important;
    }

    .btn-primary {
      background-color: #4da6ff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #3399ff;
    }

    .card-blog {
      border: 1px solid #4da6ff;
      background-color: #ffffff;
    }

    .card-blog .post-title a {
      color: #0d3b66;
    }

    .card-blog .post-title a:hover {
      color: #4da6ff;
    }

    .page-section.bg-light {
      background-color: #ffffff !important;
    }

    footer.page-footer {
      background-color: #0d3b66;
      color: #ffffff;
    }

    footer.page-footer a {
      color: #4da6ff;
    }

    footer.page-footer a:hover {
      color: #3399ff;
    }

    input.form-control, select.custom-select, textarea.form-control {
      border: 1px solid #4da6ff;
    }

    input.form-control:focus, select.custom-select:focus, textarea.form-control:focus {
      border-color: #3399ff;
      box-shadow: none;
    }

    

  :root {
    --primary: #4da6ff;
  }

  a:hover {
    color: #4da6ff !important;
  }

  .divider {
    background-color: #4da6ff !important;
  }

  </style>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> meloncare@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#" style="color:#ffffff;"><span class="mai-logo-facebook-f"></span></a>
              <a href="#" style="color:#ffffff;"><span class="mai-logo-twitter"></span></a>
              <a href="#" style="color:#ffffff;"><span class="mai-logo-dribbble"></span></a>
              <a href="#" style="color:#ffffff;"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Melon</span>-Care</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            {{-- Home --}}
        <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>

        {{-- About --}}
        <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>

        {{-- Doctors --}}
        <li class="nav-item {{ request()->routeIs('alldoctors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('alldoctors') }}">Doctors</a>
        </li>

        {{-- Contact --}}
        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>

        {{-- Guest Links --}}
        @if(!Auth::check())
            <li class="nav-item {{ request()->routeIs('register') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        @else
            {{-- Authenticated Links --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </li>
        @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <!-- page hero -->

<!-- Doctors Section -->

@yield('index_page')
@yield('all_doctors')
  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#" style="color:#4da6ff;">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="front_end/assets/img/blog/blog_1.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html"  style="color:#0d3b66;">List of Countries without Coronavirus case</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="front_end/assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <span class="mai-time"></span> 1 week ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="front_end/assets/img/blog/blog_2.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html"  style="color:#0d3b66;">Recovery Room: News beyond the pandemic</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="front_end/assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <span class="mai-time"></span> 4 weeks ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="front_end/assets/img/blog/blog_3.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html"  style="color:#0d3b66;">What is the impact of eating too much sugar?</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="front_end/assets/img/person/person_2.jpg" alt="">
                  </div>
                  <span>Diego Simmons</span>
                </div>
                <span class="mai-time"></span> 2 months ago
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="blog.html" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment Request</h1>
      <p class="bg bg-primary">
      @if(session('appointment_message'))
        <div class="alert alert-success">
          {{session('appointment_message')}}
        </div>
      @endif
      </p>
      <form class="main-form" action="{{ route('appointment') }}" method="post">
      @csrf  
      <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email_address" class="form-control" placeholder="Email Address">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="submission_date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">  
          <select name="specialty" id="specialty" class="custom-select">
          <option value="" disabled selected>Select Doctor</option>    
          @foreach($doctors as $doctor)
              <option value="{{ $doctor->specialty }}">Dr. {{$doctor->doctors_name}}'s specialty: {{$doctor->specialty}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="ic" class="form-control" placeholder="IC Number">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="number" class="form-control" placeholder="Phone Number">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section banner-home bg-image" style="background-image: url(front_end/assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="front_end/assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3" style="color:#ffffff;">Get easy access of all features using Melon Care Application</h1>
          <a href="#"><img src="front_end/assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="front_end/assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">Melon-Fitness</a></li>
            <li><a href="#">Melon-Drugs</a></li>
            <li><a href="#">Melon-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">meloncare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2025 Melon Care. All rights reserved. <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="front_end/assets/js/jquery-3.5.1.min.js"></script>

<script src="front_end/assets/js/bootstrap.bundle.min.js"></script>

<script src="front_end/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="front_end/assets/vendor/wow/wow.min.js"></script>

<script src="front_end/assets/js/theme.js"></script>
  
</body>
</html>