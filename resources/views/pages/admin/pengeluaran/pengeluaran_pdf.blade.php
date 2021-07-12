<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Finance_Report_{{ $now->format('D,m-Y') }}</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-secondary"><u>{{ $now->format('D, m Y') }}</u></h4>
            </div>
        </div>
        <hr class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <div style="text-align: center;">
                    <div>
                        <strong>Bukti Pengeluaran Kost Griyo Kenyo</strong>
                    </div>
                    <small style="margin : 0px; display: block;">Alamat : Kentingan, Jebres, Surakarta</small>
                    <small style="margin : 0px; display: block;">Owner : Anggito Galih Nuragam</small>
                    <p style="margin : 0px;">HP/WA : 085770254568</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table border="1" width="100%" cellspacing="0" cellpadding="10" class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jenis Pengeluaran</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                        </tr>
                        @forelse ($pengeluaran as $index => $p)
                            <tr>
                                <th>{{ $index+1 }}</th>
                                <td>{{ $p->date}}</td>
                                <td>{{ $p->pengeluaran }}</td>
                                <td>
                                    @if($p->status == 1)
                                    <p>Lunas</p>
                                    @else
                                    <p>Belum Lunas</p>
                                    @endif
                                </td>
                                <td>{{ $p->keterangan }}</td>
                                <td style="text-align: right;">
                                    <span>Rp {{ number_format($p->nominal) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="6" style="color: red; text-align: center;">Tidak ada data</th>
                            </tr>
                        @endforelse
                            <tr>
                                <td colspan="5" style="text-align: right;"><small>TOTAL :</small></td>
                                <th><span class="badge badge-danger justify-content-end">Rp {{ number_format($nominal) }}<span></th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>
