@extends('layouts.admin.b-master')

@section('title', 'Dashboard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard </li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'admin_operator')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $sumentrance }}</h3>

                                <p>Jumlah Tiket</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ route('entrance.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $sumuser }}</h3>

                                <p>Jumlah Pengguna</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $sumvpr }}</h3>

                                <p>Jumlah VPS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('vpr.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $sumwhm }}</h3>

                                <p>Jumlah C-Panel</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('whm.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $sumintranet }}</h3>

                                <p>Jumlah Metro</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('intranet.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $sumpriority }}</h3>

                                <p>Prioritas Tiket</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('priority.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $sumentranceByUser }}</h3>
                                <p>Jumlah Tiket</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('entrance.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $sumentranceProgress }}</h3>
                                <p>Jumlah Tiket Progress</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('entrance.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $sumentranceApproved }}</h3>

                                <p>Jumlah Tiket Disetujui</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('entrance.index') }}" class="small-box-footer">Lihat Semua <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="container-fluid">
            <div class="row">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'admin_operator')
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Statistik Tiket Per bulan</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartTicketUserByMonth->container() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Statistik Peningkatan Pengguna</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartUserByMonth->container() !!}
                            </div>
                        </div>
                    </div>
                @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Statistik Tiket Per bulan</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartTicketUserByMonth->container() !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Total Tiket Berdasarkan Kategori</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartTicketUserByCategory->container() !!}
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Total Tiket Berdasarkan Prioritas</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartTicketUserByPriority->container() !!}
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Total Tiket Berdasarkan Status</h5>
                        </div>
                        <div class="card-body">
                            {!! $chartTicketUserByStatus->container() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- @if (auth()->user()->role == 'admin' || auth()->user()->role == 'admin_operator') --}}
                {{-- <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Tiket Berdasarkan Kategori</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartTicketUserByCategory->container() !!}
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Tiket Berdasarkan Prioritas</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartTicketUserByPriority->container() !!}
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Tiket Berdasarkan Status</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartTicketUserByStatus->container() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total User Berdasarkan Verifikasi</h5>
                            </div>
                            <div class="card-body">
                                {!! $chartUserByVerified->container() !!}
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- @else --}}

            {{-- @endif --}}
        </div>
    </section>

@endsection

@push('javascript')
    <script src="{{ $chartTicketUserByCategory->cdn() }}"></script>
    {{ $chartTicketUserByCategory->script() }}
    {{ $chartTicketUserByPriority->script() }}
    {{ $chartTicketUserByStatus->script() }}
    {{ $chartTicketUserByMonth->script() }}
    {{ $chartUserByMonth->script() }}
    {{ $chartUserByVerified->script() }}
@endpush
