@extends('layouts.admin.b-master')

@section('title', 'Detail')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Detail Tentang</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <a href="{{route('abouttwo.edit',['abouttwo'=>$abouttwo?->id])}}"
                    class="btn btn-warning"><i class="fas fa-edit"></i> Perbarui</a>
                </x-slot>
                <x-table>
                    <tr>
                        <td width="20%">Judul</td>
                        <td>{{$abouttwo?->title}}</td>
                    </tr>
                    <tr>
                        <td width="20%">isi</td>
                        <td>{{$abouttwo?->body}}</td>
                    </tr>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
