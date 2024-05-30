@extends('layouts.admin.b-master')

@section('title', 'Laporan Keamanan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('reportsecurity.index')}}">Laporan Keamanan</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Nama Organisasi Perangkat Daerah</td>
                        <td>{{$reportsecurity->name_opd}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Judul</td>
                        <td>{{$reportsecurity->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal</td>
                        <td>{{\Carbon\Carbon::parse($reportsecurity->date)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Deskripsi</td>
                        <td>{!!$reportsecurity->body!!}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
