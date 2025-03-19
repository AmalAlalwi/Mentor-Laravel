
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <h1 class="logo d-flex align-items-center me-auto"><a href="{{route('index')}}">Mentor</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="#" class="logo me-auto"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="{{route('index')}}">Home</a></li>
          <li><a href="{{route('About')}}">About</a></li>
          <li><a href="{{route('Courses')}}">Courses</a></li>
          <li><a href="{{route('teachers')}}">Trainers</a></li>
          <li><a href="{{route('Events')}}">Events</a></li>
          <li><a href="{{route('Pricing')}}">Pricing</a></li>


          <li><a href="{{route('Contact')}}">Contact</a></li>
        </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- .navbar -->

      <a href="#" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->
