@extends('layouts.user')

@section('title')
    Booking
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail @yield('title')</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <a href="{{ route('user-transaksi.create') }}" class="btn btn-sm btn-primary mb-3" id="tambah-data"><span i class="fas fa-plus"></span> Tambah Transaksi</a> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-1">
                            <thead>
                                <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Nama</th>
                                <th>Nomor Kamar</th>
                                <th>Foto Pembayaran</th>
                                <th>Tanggal Pesan</th>
                                <th>Total Harga</th>
                                <th>Durasi</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $it)
                                <tr>
                                    <td>{{ $it->id }}</td>
                                    <td>{{ $it->user->name }}</td>
                                    <td>{{ $it->room->room_number }}</td>
                                    <td><img src="{{ Storage::url($it->photo_payment) }}" width="80px" height="auto"></td>
                                    <td>{{ $it->order_date }}</td>
                                    <td>Rp{{ number_format($it->total_price,2,',','.') }}</td>
                                    <td>{{ $it->duration }}</td>
                                    <td>{{ $it->arrival_date }}</td>
                                    <td>{{ $it->departure_date }}</td>
                                    <td>
                                        @if($it->status == "Lunas")
                                        <button class="btn btn-success btn-sm" style="text-align:center">Lunas</button>
                                        @else
                                        <button class="btn btn-danger btn-sm" style="text-align:center">Belum Terbayar
                                        </button>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="/DataTables/datatables.min.js"></script>
<script>
$(document).ready( function () {
    $('#table-1').DataTable();
} );
</script>
@endpush
