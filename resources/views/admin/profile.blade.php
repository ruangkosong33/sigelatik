@extends('layouts.admin.b-master')

@section('title', 'Profil')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Profil</li>
@endsection

@php
$opd_name = null;
$nip = null;
$hp = null;
$address = null;
if($user->opd()->count() > 0) {
    $opd = $user->opd;
    $opd_name = $opd->name;
    $nip = $opd->nip;
    $hp = $opd->phone;
    $address = $opd->address;
}
@endphp

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                @if(!auth()->user()->opd_id)
                <h3>Silakan isi data OPD terlebih dahulu sebelum membuat tiket!</h3>
                @endif
                <form class="g-3 mx-3 row" method="post" action="{{route('profile.update')}}">
                    @csrf
                    @method('post')
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
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <H4>Data OPD (Wajib)</H4>
                    </div>

                    <div class="col-md-6">
                        @include('admin.components.text', [
                            'title' => 'Nama OPD',
                            'name' => 'opd_name',
                            'type' => 'text',
                            'item' => $opd_name,
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('admin.components.text', [
                            'title' => 'NIP',
                            'name' => 'nip',
                            'type' => 'text',
                            'item' => $nip,
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('admin.components.text', [
                            'title' => 'Handphone',
                            'name' => 'phone',
                            'type' => 'text',
                            'item' => $hp,
                        ])
                    </div>
                    <div class="col-md-12">
                        @include('admin.components.textarea', [
                            'title' => 'Alamat',
                            'name' => 'address',
                            'item' => $address,
                        ])
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

