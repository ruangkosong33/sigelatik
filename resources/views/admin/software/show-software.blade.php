@extends('layouts.admin.b-master')

@section('title', 'Perangkat Lunak')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('software.index')}}">Perangkat Lunak</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Nama Software / Aplikasi</td>
                        <td>{{$software->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Software</td>
                        <td>{{$software->type}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Sistem Operasi</td>
                        <td>{{$software->system}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Lisensi</td>
                        <td>{{$software->license}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Pemilik Lisensi</td>
                        <td>{{$software->owner}}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
