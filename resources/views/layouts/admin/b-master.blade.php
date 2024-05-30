<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Sigelatik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bk/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('bk/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('bk/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('bk/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    @stack('css_vendor')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bk/dist/css/adminlte.min.css') }}">
    @stack('css_cdn')
    @vite(['resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!--Main Wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.admin.b-nav')
        <!-- /.navbar -->

        <!-- Sidebar -->
        @include('layouts.admin.b-sidebar')
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                @show
                            </ol>
                        </div>
                    </div><!-- End Row -->
                </div><!-- End Container Fluid -->
            </div>
            <!-- End Content Header -->

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!--End Main Content -->

        </div>
        <!-- End Content Wrapper -->

        <!-- Footer -->
        @include('layouts.admin.b-footer')
        <!-- End Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <!-- End Control Sidebar -->

    </div>
    <!-- End Main Wrapper -->

    <!-- jQuery -->
    @include('layouts.admin.b-js')
    <!-- End Jquery -->

    <!-- Sweat Alert -->
    @include('sweetalert::alert')
    <!-- End Sweat Alert -->

    <!-- Script -->
    @if (Auth::user()->role == 'admin')
        @php
            if (request()->is('notifications*')) {
                $read_reg = 0;
                $read_ticket = 0;
                $read_comment = 0;
            }
        @endphp
        <script>
            window.onload = function() {
                let notifications = 0;
                let newRegist = 0;
                let newTicket = 0;
                let newComment = 0;

                notifications += {{ $read_reg }}
                notifications += {{ $read_ticket }}
                notifications += {{ $read_comment }}
                newRegist += {{ $read_reg }}
                newTicket += {{ $read_ticket }}
                newComment += {{ $read_comment }}

                let el_notif = document.getElementById('new_notif');
                let el_newReg = document.getElementById('new_register');
                let el_newRegReal = document.getElementById('new_reg');
                let el_new_comment = document.getElementById('new_comment');
                el_notif.innerHTML = notifications
                el_newReg.innerHTML = newTicket
                el_newRegReal.innerHTML = newRegist
                el_new_comment.innerHTML = newComment
                Echo.channel('new-register')
                    .listen('RegisterNotification', (e) => {
                        console.log('TicketNotification: ' + e.message);
                        notifications += 1
                        newTicket += 1
                        el_notif.innerHTML = notifications
                        el_newReg.innerHTML = newTicket
                    });
                Echo.channel('new-reg')
                    .listen('RegNotification', (e) => {
                        console.log('RegNotification: ' + e.message);
                        notifications += 1
                        newRegist += 1
                        el_notif.innerHTML = notifications
                        el_newRegReal.innerHTML = newRegist
                    });
                Echo.channel('new-comment')
                    .listen('CommentNotification', (e) => {
                        console.log('CommentNotification: ' + e.message);
                        notifications += 1
                        newComment += 1
                        el_notif.innerHTML = notifications
                        el_new_comment.innerHTML = newComment
                    });
            }
        </script>
    @endif
    <!-- End Script -->
</body>

</html>
