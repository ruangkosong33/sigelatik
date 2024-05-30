<nav class="main-header navbar navbar-expand navbar-primary navbar-dark border-bottom-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if (Auth::user()->role == 'admin')
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-danger navbar-badge"><span id="new_notif">0</span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    {{-- <span class="dropdown-item dropdown-header">15 Notifkasi</span> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{route('notifications.index')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>
                        <span id="new_register">0</span> Tiket Baru
                    </a>
                    <a href="{{route('notifications.index')}}" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i>
                        <span id="new_reg">0</span> Pendaftar Baru
                    </a>
                    <a href="{{route('notifications.index')}}" class="dropdown-item">
                        <i class="fas fa-comments mr-2"></i>
                        <span id="new_comment">0</span> Komentar Baru
                    </a>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="document.querySelector('#form-logout').submit()">
                <i class="fas fa-sign-out-alt">Keluar</i>
            </a>
            <form action="{{ route('logout') }}" method="post" id="form-logout">
                @csrf
            </form>
        </li>
    </ul>
</nav>
