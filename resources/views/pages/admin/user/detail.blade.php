@extends('layouts.admin')

@section('title')
    Data Penghuni
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Table @yield('title')</h1>
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
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Foto Ktp</th>
                        <th>Profesi</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody>
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
<script type="text/javascript" src="/DataTables/datatables.min.js"></script>
<script>
    var datatable = $('#table-1').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url() -> current()!!}',
        },
        columns:[
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'no_hp', name: 'no_hp'},
            {data: 'photo_ktp', name: 'photo_ktp'},
            {data: 'address', name: 'address'},
            {data: 'profession', name: 'address'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
            },
        ]
    });
</script>
@endpush