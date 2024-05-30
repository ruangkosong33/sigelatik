@extends('layouts.admin.b-master')

@section('title', 'Tambah Pengguna')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Tambah Pengguna</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Pengguna</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('users.store') }}">
                @csrf
                @method('post')
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Nama',
                        'name' => 'name',
                        'type' => 'text',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Password',
                        'name' => 'password',
                        'type' => 'password',
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.select', [
                        'title' => 'Hak Akses',
                        'name' => 'role',
                        'data' => ['Admin' => 'admin', 'Admin Operator' => 'admin_operator', 'Admin OPD'=>'admin_opd'],
                        'item' => null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.select', [
                        'title' => 'Verifikasi',
                        'name' => 'verified',
                        'data' => ['Terverifikasi' => 1, 'Tidak Diverifikasi' => 0],
                        'item' => 1,
                    ])
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
