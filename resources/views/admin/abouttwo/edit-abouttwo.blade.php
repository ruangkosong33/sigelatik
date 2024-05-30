@extends('layouts.admin.b-master')

@section('title', 'Detail')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Edit Tentang</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="row">
                <form class="g-3 mx-3 row" method="post" action="{{route('abouttwo.update',['abouttwo'=>$abouttwo?->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        @include('admin.components.text', [
                            'title' => 'Judul',
                            'name' => 'title',
                            'type' => 'text',
                            'item' => $abouttwo?->title,
                        ])
                    </div>
                    <div class="col-md-12">
                        @include('admin.components.textarea', [
                            'title' => 'Isi',
                            'name' => 'body',
                            'type' => 'text',
                            'item' => $abouttwo?->body,
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
