<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>SIGELATIK - LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{asset('lg/assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('lg/assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('lg/assets/fonts/flaticon/font/flaticon.css')}}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('lg/assets/img/pemprov.ico')}}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('lg/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{asset('lg/assets/css/skins/default.css')}}">

</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TAGCODE"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Login 2 start -->
<div class="login-2">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 col-md-12 bg-img">
                <div class="info">
                    <div class="info-text">
                        <div class="waviy">
                            <span style="--i:1">S</span>
                            <span style="--i:2">I</span>
                            <span style="--i:3">G</span>
                            <span style="--i:4">E</span>
                            <span style="--i:5">L</span>
                            <span style="--i:6">A</span>
                            <span class="color-yellow" style="--i:7">T</span>
                            <span class="color-yellow" style="--i:8">I</span>
                            <span class="color-yellow" style="--i:9">K</span>
                        </div>
                        <p><strong>(Sistem Informasi Layanan Gangguan Layanan TIK )</strong>, Laporkan apabila terjadi gangguan terhadap Layanan TIK yang ada di Lingkup Pemerintah Provinsi Kalimantan Timur</p>
                        <div class="social-buttons">
                            <a href="#" class="social-button social-button-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="social-button social-button-twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="social-button social-button-google">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="#" class="social-button social-button-linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 form-info">
                <div class="form-section">
                    <div class="logo clearfix">
                        <a href="{{route('login')}}">
                            <img src="{{asset('lg/assets/img/logos/logo-2.png')}}" alt="logo">
                        </a>
                    </div>
                    <h3>Login ke Akun Anda</h3>
                    <div class="login-inner-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group form-box">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" aria-label="Email Address" autofocus>
                                <i class="flaticon-mail-2"></i>

                                @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group form-box">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" placeholder="Kata Sandi" aria-label="Password">
                                <i class="flaticon-password"></i>

                                @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group form-box center">
                                {!! NoCaptcha::display() !!}
                                {!! NoCaptcha::renderJs() !!}
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md btn-theme w-100">Masuk</button>
                            </div>
                            <p class="text">OPD Belum Mempunyai Akun ?<a href="{{route('register')}}"> <br> Daftar <strong>Registrasi</strong></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 2 end -->

<!-- External JS libraries -->
<script src="{{asset('lg/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('lg/assets/js/popper.min.js')}}"></script>
<script src="{{asset('lg/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Custom JS Script -->
</body>
</html>
