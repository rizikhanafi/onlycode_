@extends('layouts.template')
@section('title','Inventori')
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
    <h1 class="h3 mb-2 text-gray-800">Inventori</h1>
    <p class="mb-4">Data inventori beserta supplier.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
          <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
        aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="/barang/tambah">Tambah Data</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Tambah Stok</a>
        </div>

        <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Stok Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="/barang/tambahstok" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>ID :</label>
                        <input name="id" type="text" readonly placeholder="ID terisi otomatis.." class="form-control form-control-solid @error('id') is-invalid @enderror">
                        @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Barang :</label>
                        <select name="nama_barang" class="form-control form-control-solid @error('nama_barang') is-invalid @enderror" id="nama_barang">
                            @foreach ($nama_barang as $data)
                            <option>{{ $data -> nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label>Stok :</label>
                        <input name="stok" value="{{ old('stok') }}" required class="form-control form-control-solid @error('stok') is-invalid @enderror" type="text">
                        @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal:</label>
                          <input type="date" name="tgl" class="form-control form-control-solid @error('tgl') is-invalid @enderror">
                          @error('tgl')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
            <button class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    <!-- END MODAAAALL -->
         </div>
         </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Nama Supplier</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Nama Supplier</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($nama_barang as $data)
                        <tr>
                            <td>{{ $data -> id_barang }}</td>
                            <td>{{ $data -> nama_barang }}</td>
                            <td>{{ $data -> harga }}</td>
                            <td>{{ $data -> stok }}</td>
                            <td>{{ $data -> nama_supplier }}</td>
                            <td>
                                <a href="/barang/ubah/{{$data -> id_barang}}" class="btn btn-primary">
                                    Edit
                                </a>
                                <a href="/barang/hapus/{{ $data -> id_barang }}" class="btn btn-danger">
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
