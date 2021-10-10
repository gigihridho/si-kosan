@extends('layouts.admin')

@section('title')
    Data Booking
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin-dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    @include('includes.tabs')
                    <div class="table-responsive mt-2">
                    <table class="table table-striped" id="table-1">
                        <thead>
                        <tr style="text-align: center">
                            <th scope="col">
                            No
                            </th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Pemesanan</th>
                            <th scope="col">Bukti Transaksi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $index => $tf)
                            <tr style="text-align: center">
                                <td>{{ $index+1 }}</td>
                                <td>{{ $tf->user->name }}</td>
                                <td>{{ $tf->kode }}</td>
                                <td>
                                    @if($tf->bukti_pembayaran != null)
                                        <img height="100px" src="{{ Storage::url($tf->bukti_pembayaran) }}" alt="" onclick="blank">
                                    @else
                                        <span class="badge badge-warning">Belum Upload</span>
                                    @endif
                                </td>
                                <td>
                                    @if($tf->transaction_status == "PENDING")
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif($tf->transaction_status == "SUCCESS")
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($tf->transaction_status == "CANCELLED")
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- <div class="row"> --}}
                                    @if($tf->transaction_status == "PENDING")
                                    <form action="{{ route('status',$tf->id) }}" method="POST" enctype="multipart/form-data" style="display:inline-block">
                                        @csrf
                                        <button value="SUCCESS" id="transaction_status" name="transaction_status" type="submit" title="Konfirmasi" data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm edit" onClick="return confirm('Anda ingin melakukan konfirmasi pembayaran ini?')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <a title="Detail" data-toggle="tooltip" data-placement="top" class="btn btn-warning btn-sm" href="{{ route('detail-booking',$tf->id) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </form>
                                    <form action="{{ route('batal',$tf->id) }}" method="POST" enctype="multipart/form-data" style="display:inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button value="CANCELLED" type="submit" title="Hapus" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Anda ingin membatalkan pemesanan kamar ini ?')">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                {{-- </div> --}}
                                    @else
                                    <a title="Detail" data-toggle="tooltip" data-placement="top" class="btn btn-warning btn-sm" href="{{ route('detail-booking',$tf->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('addon-script')
<script>
    $(document).ready( function () {
        $('#table-1').DataTable({
            responsive: true,
            "language":{
                "emptyTable": "Tidak ada data yang ditampilkan"
            }
        });
    } );
</script>
@endpush
