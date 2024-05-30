@extends('layouts.admin.b-master')

@section('title', 'Pengguna')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Pengguna</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Semua Pengguna</h3>
            <div class="card-tools">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Tambah Pengguna</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hak Akses</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th
                                class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class='text-center' style="width: 20px">{{$loop->iteration + ($users->currentPage() - 1 ) * $users->perPage() }}</td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0">{{ $user->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="font-weight-bold mb-0">{{ $user->email }}</p>
                                </td>
                                <td>
                                    <p class="mb-0">{{ $user->role }}</p>
                                </td>
                                <td>
                                    <p class="mb-0">{{ $user->verified?'Terverifikasi':'Tidak Terverifikasi' }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('users.edit', [$user->id]) }}"
                                            class="btn btn-info btn-sm mr-2">Edit</a>
                                        <form method="post" class="d-inline"
                                            action="{{ route('users.destroy', [$user->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="btnDelete()"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
@endsection

@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function btnDelete() {
        event.preventDefault()
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
</script>
@endpush
