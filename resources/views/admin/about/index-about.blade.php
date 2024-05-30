@extends('layouts.admin.b-master')

@section('title', 'Tentang Kami')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Tentang</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">

                    @if($about->isEmpty())
                        <a href="{{route('about.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
                    @else
                        <a href="{{ route('about.edit', $about->first()->id) }}" class="btn btn-warning"><i class="fas fa-plus-circle"></i> Edit</a>

                        <form method="post" action="{{route('about.destroy', $about->first()->id)}}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data?')">
                                <i class="fas fa-trash"> Hapus</i>
                            </button>
                        </form>

                    @endif

                </x-slot>

                <x-table>

                    <x-slot name="thead">
                        <th>Judul</th>
                        <th>Deskripsi</th>
                    </x-slot>
                        @foreach ($about as $abouts)
                        <tr>
                            <td width="38%">Sub Judul</td>
                            <td>{{$abouts->title}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Body Kiri</td>
                            <td>{!!$abouts->body_left!!}</td>
                        </tr>
                        <tr>
                            <td width="38%">Body Kanan</td>
                            <td>{!!$abouts->body_right!!}</td>
                        </tr>
                        @endforeach
                        
                </x-table>
            </x-card>
        </div>
    </div>

@endsection
