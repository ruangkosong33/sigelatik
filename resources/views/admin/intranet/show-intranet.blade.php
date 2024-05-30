@extends('layouts.admin.b-master')

@section('title', 'Intranet')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('intranet.index')}}">Intranet</a></li>
    <li class="breadcrumb-item active">Detail Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-table>
                    <tr>
                        <td width="20%">Nama Jaringan</td>
                        <td>{{$intranet->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Instansi / OPD Yang di Hubungkan</td>
                        <td>{{$intranet->instance}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Jenis Jaringan / FO, Metro, Wireless</td>
                        <td>{{$intranet->type}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Link State</td>
                        <td>{{$intranet->link}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Bandwith / MB</td>
                        <td>{{$intranet->bandwith}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Download / MB</td>
                        <td>{{$intranet->download}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Upload / MB</td>
                        <td>{{$intranet->upload}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Pengelola Jaringan</td>
                        <td>{{$intranet->manage}}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
