@extends('layouts.admin.b-master')

@section('title', 'Laporan Jaringan')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('reportnetwork.index')}}">Laporan Gangguan Jaringan</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Nama Organisasi Perangkat Daerah</td>
                        <td>{{$reportnetwork->name_opd}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Judul</td>
                        <td>{{$reportnetwork->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal</td>
                        <td>{{\Carbon\Carbon::parse($reportnetwork->date)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td width="30%">Deskripsi</td>
                        <td>{!!$reportnetwork->body!!}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
