@extends('layouts.template')
@section('title','Pembayaran')
@section('konten')
<!-- Begin Page Content -->
@if (session('pesan'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <h5 class="alert-heading">Berhasil</h5>
    {{ session('pesan') }}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>

</div>
@endif

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
    <p class="mb-4">Data pembayaran Wildventory.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
          <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
        aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="/pembayaran/tambah">Tambah Data</a>
                                        </div>
                                    </div>
                                </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pembeli</th>
                            <th>Barang</th>
                            <th>Tanggal Bayar</th>
                            <th>Total Beli</th>
                            <th>Keterangan</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Pembeli</th>
                            <th>Barang</th>
                            <th>Tanggal Bayar</th>
                            <th>Total Beli</th>
                            <th>Keterangan</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($nama as $data)
                        <tr>
                            <td>{{ $data -> id_bayar }}</td>
                            <td>{{ $data -> pembeli }}</td>
                            <td>{{ $data -> nama_barang }}</td>
                            <td>{{ $data -> tanggal_bayar }}</td>
                            <td>{{ $data -> total_beli }}</td>
                            <td>{{ $data -> keterangan }}</td>
                            <td>
                                <a href="#" class="btn btn-danger">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
