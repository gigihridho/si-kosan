@extends('layouts.admin')

@section('title')
    Fasilitas
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Table @yield('title')</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Table @yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="card-header">
                        <h4>Edit Fasilitas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fasilitas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                        <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-success px-5" style="padding: 8px 16px">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
