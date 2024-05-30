@extends('layouts.admin.b-master')

@section('title', 'Notifikasi')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Notifikasi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <x-card>
                <div class="card-header">
                    <h4>Notifikasi</h4>
                </div>
                <div class="card-body">
                    <div class="timeline timeline-inverse">
                        @forelse ($items as $item)
                            @if ($item->type == 'register')
                                <div>
                                    <i class="fas fa-user bg-info"></i>
                                    <div class="timeline-item">
                                        <span class="time">{{ $item->created_at }}</span>
                                        <h3 class="timeline-header border-0">
                                            <strong>{{ $item->user ? $item->user->name : $item->name }}</strong> registrasi
                                            baru.
                                        </h3>
                                        <div class="timeline-footer">
                                            @if ($item->user)
                                                @if ($item->user->verified)
                                                    Akun telah diregistrasi
                                                @else
                                                    <a href="{{ route('entrance.verified', $item->user->id) }}"
                                                        class="btn btn-primary btn-sm">Verifikasi</a>
                                                @endif
                                            @else
                                                User telah dihapus
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @elseif($item->type == 'ticket')
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>
                                    <div class="timeline-item">
                                        <span class="time">{{ $item->created_at }}</span>
                                        @if ($item->user)
                                            <h3 class="timeline-header">
                                                <strong>{{ $item->user->name }}</strong> buat Tiket baru
                                                @if($item->entrance_id)
                                                <a href="{{ route('entrance.detail', $item->entrance_id) }}">Lihat
                                                    Tiket</a>
                                                @else
                                                <br>
                                                Tiket telah dihapus
                                                @endif
                                            </h3>
                                        @else
                                            User telah dihapus
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>
                                    <div class="timeline-item">
                                        <span class="time">{{ $item->created_at }}</span>
                                        <h3 class="timeline-header">
                                            <strong>{{ $item->user ? $item->user->name : $item->name }}</strong> tulis
                                            komentar
                                            baru
                                        </h3>
                                        @if ($item->user)
                                            @if ($item->entrance_id)
                                                <div class="timeline-footer">
                                                    <a href="{{ route('entrance.detail', $item->entrance_id) }}"
                                                        class="btn btn-warning btn-flat btn-sm">Lihat Komentar</a>
                                                </div>
                                            @else
                                            Tiket telah dihapus
                                            @endif
                                        @else
                                            User telah dihapus
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @empty
                            Belum ada notifikasi
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    {{ $items->links() }}
                </div>
            </x-card>
        </div>
    </div>
@endsection
