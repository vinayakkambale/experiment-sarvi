<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SarviSolutions</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{url('frontend/img/sarvi-logo.webp')}}" rel="icon">
  <link href="{{url('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{url('frontend/css/main.css')}}" rel="stylesheet">

 
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{url('/home')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{-- <img src="{{url('frontend/img/sarvi-logo.webp')}}" alt="">  --}}
        <h1 class="sitename">Vehiclee</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{url('/')}}" class="active">Home<br></a></li>
          <li><a href="{{url('/about')}}">About</a></li>
          {{-- <li><a href="{{url('/courses')}}">Courses</a></li> --}}
          {{-- <li><a href="{{url('/trainers')}}">Trainers</a></li> --}}
          {{-- <li><a href="{{url('/events')}}">Events</a></li> --}}
          <li><a href="{{url('/pricing')}}">Pricing</a></li>
          <li><a href="{{url('/contact')}}">Contact</a></li>
          @if (Route::has('login'))
                @auth
                    @if(auth()->user()->is_admin)  {{-- Check if the user is an admin --}}
                        <li>
                            <a
                                href="{{ route('admin.dashboard') }}"  {{-- Redirect to admin dashboard --}}
                                class="btn-getstarted pe-4 ms-0"
                            >
                                Admin Dashboard
                            </a>
                        </li>
                    @else  {{-- Regular user --}}
                        <li>
                            <a
                                href="{{ route('dashboard') }}"  {{-- Redirect to user dashboard --}}
                                class="btn-getstarted pe-4 ms-0"
                            >
                                Dashboard
                            </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Login
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a
                                href="{{ route('register') }}"
                                class="btn-getstarted pe-4 ms-0"
                            >
                                Get Started
                            </a>
                        </li>
                    @endif
                @endauth
            @endif

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted" href="">Get Started</a> --}}

    </div>
  </header>