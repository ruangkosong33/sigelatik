<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIGELATIK - KALTIM</title>
  <meta content="PF" name="description">
  <meta content="PF" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('fr/assets/img/pemprov.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  @vite([ 'resources/sass/app-guest.scss'])

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">

      <!-- Navbar -->
      @include('layouts.guest.f-navbar')
      <!--End Navbar -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Sistem Informasi</h1>
          <h2>Gangguan Layanan TIK</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{route('login')}}" class="btn-get-started scrollto">Ayo Mulai</a>
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Tonton Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('fr/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

    <!-- Content -->
    @yield('content')
    <!-- End Content -->

  <!-- Footer -->
  @include('layouts.guest.f-footer')
  <!-- End Footer -->

  <!-- Javascript -->
  @include('layouts.guest.f-js')
  <!-- End Javascript -->

</body>

</html>
