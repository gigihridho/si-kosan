@extends('layouts.user')

@section('title')
    Edit Profil
@endsection
<link rel="stylesheet" href="{{ asset('assets/css/editProfil.css') }}" type="text/css">
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                @php $no = 1; @endphp
                @foreach ($data as $u)
                <div class="container">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action="{{ route('change-profil-user-redirect',$u->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-4">
                            <div class="card1">
                                <div class="card-body">
                                    <i class="fas fa-user mr-2"></i> Foto KTP
                                    <hr>
                                    <div class="rounded">
                                        @if ($u->foto_ktp == null)
                                            <img id="img_ktp" src="{{ asset('assets/img/avatar/avatar-1.png') }}" name="foto_ktp" width="170px" height="170px" alt="foto"
                                            style="display: block; margin:auto">
                                        @else
                                            <img id="img_ktp" src="{{ Storage::url($u->foto_ktp) }}" name="foto_ktp" width="170px" height="170px" alt="foto"
                                            style="display: block; margin:auto">
                                        @endif
                                    </div>
                                    <div style="text-align:center">
                                        <label for="change_pic">Ganti Foto KTP</label>
                                        <br>
                                        <strong style=>Info!</strong> Maksimum ukuran foto : 2MB
                                        <br>
                                        <input id="foto_ktp" name="foto_ktp" type="file"><br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-12">
                            <div class="card">
                                <div class="card-body"> --}}
                                    {{-- <table class="w-100 table-responsive">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <br>
                                                    Nama
                                                    <input type="text" name="name" value="{{ $u->name }}" class="form-control" style="margin-right:190px;" autocomplete="off">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <br>
                                                    Email
                                                    <input type="email" name="email" value="{{ $u->email }}" class="form-control" style="margin-right:190px" autocomplete="off">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <br>
                                                    No Telepon
                                                    <input type="number" name="no_hp" value="{{ $u->no_hp }}" class="form-control"  style="margin-right:190px" autocomplete="off">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <br>
                                                    Alamat
                                                    <input type="text" name="alamat" value="{{ $u->alamat }}"class="form-control"  style="margin-right:190px" autocomplete="off">
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <br>
                                                    Pekerjaan
                                                    <input type="text" name="pekerjaan" value="{{ $u->pekerjaan }}" class="form-control"  style="margin-right:190px" autocomplete="off">
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                    {{-- <div class="form-group"></div>
                                    <td>
                                        <button type="submit" class="btn btn-primary px-5">
                                            Simpan
                                        </button>
                                        <a href="{{ route('profil-user') }}" class="btn btn-danger px-5 text-white">
                                            Batal
                                        </a>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
		                <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                    <input id="name" name="name" value="{{ $u->name }}" class="form-control here" required="required" type="text">
                                    </div>
                                </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-3 col-form-label">Nomor Handphone</label>
                                <div class="col-9">
                                  <input id="lastname" name="no_hp" value="{{ $u->no_hp }}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                  <input id="text" name="alamat" value="{{ $u->alamat }}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Pekerjaan</label>
                                <div class="col-9">
                                  <input id="text" name="pekerjaan" value="{{ $u->pekerjaan }}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Bank</label>
                                <div class="col-9">
                                  <input id="text" name="bank" value="{{ $u->bank }}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Nomor Rekening</label>
                                <div class="col-9">
                                  <input id="text" name="no_rekening" value="{{ $u->no_rekening }}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-3 col-form-label">Foto KTP</label>
                                <div class="col-9">
                                    @if ($u->foto_ktp == null)
                                    <div class="image-preview" id="imagePreview">
                                        <img src="" alt="Image Preview" class="image-preview__image">
                                            <span class="image-preview__default-text">
                                            +</span>
                                    </div>
                                    @else
                                        <img id="img_ktp" src="{{ Storage::url($u->foto_ktp) }}" name="foto_ktp" width="250px" height="200px" alt="foto"
                                        style="display: block; margin-bottom:15px; margin-right:auto">
                                    @endif
                                    <input id="foto_ktp" name="foto_ktp" type="file"><br>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-4 col-8" style="margin-top: 30px">
                                    <button type="submit" class="btn btn-primary px-5">
                                        Simpan
                                    </button>
                                    <a href="{{ route('profil-user') }}" class="btn btn-danger px-5 text-white">
                                        Batal
                                    </a>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
		                </div>
		            </div>
                </form>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
@push('addon-script')
<script type="text/javascript">
    $(function () {
        $("#foto_ktp").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_ktp').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
