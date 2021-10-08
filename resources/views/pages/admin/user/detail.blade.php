@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail @yield('title')</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Detail @yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        @foreach ($user as $u)
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $u->name }}" disabled>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $u->email }}" disabled>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>No HP</label>
                                <input type="email" class="form-control" value="{{ $u->no_hp }}" disabled>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Alamat</label>
                                <input type="tel" class="form-control" value="{{ $u->alamat }}" disabled>
                            </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                <label>Pekerjaan</label>
                                    <input type="email" class="form-control" value="{{ $u->pekerjaan }}" disabled>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Foto KTP</label>
                                    @if ($u->foto_ktp != null)
                                        <img src="{{ Storage::url($u->foto_ktp) }}" width="180px" height="170px"
                                        style="display:block; margin-left:auto; margin-right:auto;" alt="fotoKtp">
                                    @else
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}"  width="180px" height="170px"
                                        style="display:block; margin-left:auto; margin-right:auto;" alt="fotoKtp">
                                    @endif
                                    </div>
                            </div>
                            <div class="row">
                                <div class="justify-content-left ml-4">
                                    <a href="{{ route('user.index') }}" class="btn btn-info px-4 py-2">Kembali</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
