@extends('layouts.admin.b-master')

@section('title', 'Edit Pengguna')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Pengguna</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Pengguna</h3>
        </div>
        <div class="card-body">
            <form class="g-3 mx-3 row" method="post" action="{{ route('users.update', [$user->id]) }}">
                @csrf
                @method('put')
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Nama',
                        'name' => 'name',
                        'type' => 'text',
                        'item' => $user->name,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.text', [
                        'title' => 'Email',
                        'name' => 'email',
                        'type' => 'email',
                        'item' => $user->email,
                    ])
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin.components.select', [
                        'title' => 'Hak Akses',
                        'name' => 'role',
                        'data' => [
                            'Admin' => 'admin',
                            'Admin Operator' => 'admin_operator',
                            'Admin OPD' => 'admin_opd',
                        ],
                        'item' => $user->role,
                    ])
                </div>
                <div class="col-md-6">
                    @include('admin.components.select', [
                        'title' => 'Verifikasi',
                        'name' => 'verified',
                        'data' => ['Terverifikasi' => 1, 'Tidak Diverifikasi' => 0],
                        'item' => $user->verified,
                    ])
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
            @if ($user->role == 'admin_opd')
                @if ($user->opd()->count() > 0)
                    @php
                    $data_opd = $user->opd;
                    @endphp
                    <div class="my-3"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Nama OPD</td>
                                        <th>{{$data_opd->name}}</th>
                                    </tr>
                                    <tr>
                                        <td>Slug</td>
                                        <th>{{$data_opd->slug}}</th>
                                    </tr>
                                    <tr>
                                        <td>NIP</td>
                                        <th>{{$data_opd->nip}}</th>
                                    </tr>
                                    <tr>
                                        <td>Handphone</td>
                                        <th><a href="tel:{{$data_opd->phone}}">{{$data_opd->phone}}</a></th>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <th>{{$data_opd->address}}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="my-3">
                        <h5><i>Admin OPD belum mengisi data OPD!</i></h5>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
