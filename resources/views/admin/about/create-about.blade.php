@extends('layouts.admin.b-master')

@section('title', 'Tentang Kami')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('about.index')}}">Tentang Kami</a></li>
    <li class="breadcrumb-item active">Tambah Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card>

                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Tentang Kami">
                    </div>

                    <div class="form-group">
                        <label for="body_left">Deskripsi Kiri</label>
                        <textarea class="form-control" name="body_left" placeholder="Tentang Kami" id="summernote_left"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="body_right">Deskripsi Kanan</label>
                        <textarea class="form-control" name="body_right" placeholder="Tentang Kami" id="summernote_right"></textarea>
                    </div>

                    <x-slot name="footer">
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </x-slot>

                </x-card>
            </form>
        </div>
    </div>
@endsection

@push('css_vendor')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('bk/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@push('js_vendor')
<!-- Summernote -->
<script src="{{ asset('bk/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush

@push('script')
<script>
    $('#summernote_left').summernote({
        fontNames: [''],
        height: 200,
    });

    $('#summernote_right').summernote({
        fontNames: [''],
        height: 200,
    });

    $('.note-btn-group.note-fontname').remove();
    setTimeout(() => {
        $('.note-btn-group.note-fontname').remove();
    }, 300);
</script>
@endpush
