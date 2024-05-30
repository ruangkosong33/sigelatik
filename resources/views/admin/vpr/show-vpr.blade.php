@extends('layouts.admin.b-master')

@section('title', 'VPS')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('vpr.index')}}">Virtual Private Server</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Judul</td>
                        <td>{{$vpr->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Kebutuhan</td>
                        <td>{!!$vpr->needs!!}</td>
                    </tr>
                    <tr>
                        <td width="20%">Tanggal</td>
                        <td>{{\Carbon\Carbon::parse($vpr->date)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td width="20%">IP Publik</td>
                        <td>{{$vpr->ip_public}}</td>
                    </tr>
                    <tr>
                        <td width="20%">IP Lokal</td>
                        <td>{{$vpr->ip_local}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Storage/GB</td>
                        <td>{{$vpr->storage}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Core</td>
                        <td>{{$vpr->core}}</td>
                    </tr>
                    <tr>
                        <td width="20%">RAM</td>
                        <td>{{$vpr->ram}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Port Allow</td>
                        <td>{{$vpr->port}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Database</td>
                        <td>{{$vpr->database}}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
