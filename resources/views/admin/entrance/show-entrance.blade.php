@extends('layouts.admin.b-master')

@section('title', 'Permohonan Tiket')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('entrance.index')}}">Permohonan Tiket</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Judul Permohonan</td>
                        <td>{{$entrance->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Kategori</td>
                        <td>{{$entrance->category->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Prioritas</td>
                        <td>{{$entrance->priority->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal Permohonan</td>
                        <td>{{\Carbon\Carbon::parse($entrance->date)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Status</td>
                        <td>{{$entrance->status}}</td>
                    </tr>
                    <tr>
                        <td width="20%">File Surat</td>
                        <td><a href="{{ asset('storage/uploads/file-ticket/' . $entrance->file) }}" target="_blank">{{$entrance->file}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Deskripsi</td>
                        <td>{!!$entrance->description!!}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>

        @include('admin.entrance.comments', ['entrance'=>$entrance])
    </div>
@endsection
