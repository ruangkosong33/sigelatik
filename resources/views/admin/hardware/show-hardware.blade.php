@extends('layouts.admin.b-master')

@section('title', 'Perangkat Keras')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('hardware.index')}}">Perangkat Keras</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Nama Server</td>
                        <td>{{$hardware->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Penggunaan / Web Server, Mail Server, Data Server</td>
                        <td>{{$hardware->utilization}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Pengelola Server</td>
                        <td>{{$hardware->manage}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Lokasi Server</td>
                        <td>{{$hardware->location}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Aplikasi Terinstall</td>
                        <td>{{$hardware->application}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Spesifikasi</td>
                        <td>{{$hardware->specific}}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
