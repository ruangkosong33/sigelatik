@extends('layouts.guest.f-master')

@section('content')
    <main id="main">

        <!-- Client Eksternal -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    @forelse ($thumbnails as $item)
                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <a href="{{ $item->link }}">
                            <img src="{{asset('storage/image-thumbnail/' . $item->image)}}" class="img-fluid" alt="">
                        </a>
                    </div>
                    @empty
                    <p class="text-center">Tidak Ada Data Link Thumbnail</p>
                    @endforelse

                </div>

            </div>
        </section>
        <!-- End Cliens Eksternal -->

        <!-- Tentang Kami -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{$about?->title}}</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                <p>
                   {{$about?->body_left}}
                </p>
                {{-- <ul>
                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                    <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                    <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                </ul> --}}
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                   {{$about?->body_right}}
                </p>
                {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
                </div>
            </div>

            </div>
        </section>
        <!-- End Tentang Kami -->

        <!-- Layanan -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3><strong>Layanan Data Center</strong></h3>
                            <p>
                                Layanan dan Solusi IT terhadap OPD/ SKPD Pemprov Kaltim Cloud Computing
                                mencakup : Software as Service, Platform as Service dan Infrastructure as Service.
                                Seperti Virtual Server, Web Hosting dan Co-Location
                        </div>

                        <div class="accordion-list">
                            @forelse ($layanans as $index => $item)
                                <ul>
                                    <li>
                                        <a data-bs-toggle="collapse" class="collapse {{$item->id}}" data-bs-target="#accordion-list-{{ $item->id }}">
                                            <span>{{ $index + 1 }}</span>{{ $item->title }}
                                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                                        </a>
                                        <div id="accordion-list-{{ $item->id }}" class="collapse" data-bs-parent=".accordion-list">
                                            <p>
                                                {!! $item->body !!}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            @empty
                                <p>Tidak Ada Data Layanan</p>
                            @endforelse
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                            style='background-image: url("{{ asset('fr/assets/img/why-us.png') }}");' data-aos="zoom-in"
                            data-aos-delay="150">&nbsp;
                    </div>
                </div>

            </div>
        </section>
        <!-- End Layanan -->

        <!-- ======= Services Section ======= -->
        {{-- <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan</h2>
                    <p>{{ $layanans->isNotEmpty() ? $layanans->first()->title : '' }}</p>
                </div>

                <div class="row">
                    @forelse ($layanans as $item)
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4>{{$item->title}}</h4>
                            <p>{!!$item->body!!}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">Tidak Ada Data Layanan</p>
                    @endforelse
                </div>

            </div>
        </section> --}}
        <!-- End Services Section -->

        <!-- Statistik -->
        <section id="statistik" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Statistik</h2>
                </div>

                <div class="row">

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="box featured">
                            <h3>Total Ticket <br> Berdasarkan Kategori</h3>
                            {!! $chartTicketByCategory->container() !!}
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>Total Ticket <br> Berdasarkan Prioritas</h3>
                            {!! $chartTicketByPriority->container() !!}
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box featured">
                            <h3>Total Ticket <br> Berdasarkan Status</h3>
                            {!! $chartTicketByStatus->container() !!}
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box featured">
                            <!-- Add content for the fourth box here -->
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Statistik -->

        <!-- Chart Bulanan -->
        <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{asset('fr/assets/img/skills.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>Total Permohonan Tiket Bulanan</h3>
                        {!! $chartTicketByMonth->container() !!}
                    </div>
                </div>

            </div>
        </section>
        <!-- End Chart Bulanan -->

       <!-- Chart Cyber Security -->
       <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>Top Serangan <br>Organisasi Perangkat Daerah</h3>
                        {!! $chartReportSecurityByTitle->container() !!}
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{asset('fr/assets/img/security.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section>
        <!-- End Chart Cyber Security -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team Infrastruktur</h2>
                    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                </div>

                <div class="row">
                    @forelse ($teams as $item)
                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('storage/image-team/'. $item->image) }}"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>{{$item->name}}</h4>
                                <span>{{$item->jabatan}}</span>
                                <p>{{$item->testimoni}}</p>
                                {{-- <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">Tidak Ada Data Team</p>
                    @endforelse
                </div>

            </div>
        </section>
        <!-- End Team Section -->

    </main><!-- End #main -->

@endsection

@push('js')
    <script src="{{ $chartTicketByCategory->cdn() }}"></script>
    {{ $chartTicketByCategory->script() }}
    {{ $chartTicketByPriority->script() }}
    {{ $chartTicketByStatus->script() }}
    {{ $chartTicketByMonth->script() }}
    {{ $chartReportSecurityByTitle->script() }}
@endpush
