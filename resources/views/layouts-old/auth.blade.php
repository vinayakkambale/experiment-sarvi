<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    @vite([
        // theme assets
        //favicon
        'resources/assets/img/favicon.png',
    
        //vendor css files
        'resources/assets/vendor/bootstrap/css/bootstrap.min.css',
        'resources/assets/vendor/bootstrap-icons/bootstrap-icons.css',
        'resources/assets/vendor/boxicons/css/boxicons.min.css',
        'resources/assets/vendor/quill/quill.snow.css',
        'resources/assets/vendor/quill/quill.bubble.css',
        'resources/assets/vendor/remixicon/remixicon.css',
        'resources/assets/vendor/simple-datatables/style.css',
    
        //main css
        'resources/assets/css/style.css',
    ])


    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
        


    <!-- Vendor CSS Files -->
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link href="" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="" rel="stylesheet">

</head>

<body>

    @include('layouts.adminpages.header')

    <main id="main" class="main">

        <!-- <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div> -->
        <!-- End Page Title -->

        <section class="section">
            @yield('content')
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.adminpages.footer')
    
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @vite([
        //Template Main JS File
        'resources/assets/js/main.js',
    
        //Vendor JS Files
        'resources/assets/vendor/apexcharts/apexcharts.min.js',
        'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'resources/assets/vendor/chart.js/chart.umd.js',
        'resources/assets/vendor/echarts/echarts.min.js',
        'resources/assets/vendor/quill/quill.js',
        'resources/assets/vendor/simple-datatables/simple-datatables.js',
        'resources/assets/vendor/tinymce/tinymce.min.js',
        'resources/assets/vendor/php-email-form/validate.js',
        'resources/js/app.js',
    ]);
    <script>
      $(document).ready(function () {
        $('#logout-btn').click(function () {
         
          window.location.href='{{route('logout')}}'
        })
      })

      $(document).ready(function () {
        $('#login-btn').click(function () {
         
          window.location.href='{{route('login')}}'
        })
      })
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>
    <script src=""></script>

    <!-- Template Main JS File -->
    <script src=""></script>

</body>

</html>
