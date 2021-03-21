@extends('layouts.template')
@section('title','Inventori')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Inventori</h1>
    <p class="mb-4">Data inventori beserta supplier.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
                        </div>
                        <div class="card-body">
                            <form action="/barang/tambah/insert" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>ID :</label>
                                    <input name="id_barang" type="text" value="BAR" class="form-control form-control-solid @error('id_barang') is-invalid @enderror">
                                    @error('id_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama Barang :</label>
                                    <input name="nama_barang" value="{{ old('nama_barang') }}" required class="form-control form-control-solid @error('nama_barang') is-invalid @enderror" type="text">
                                    @error('nama_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label>Harga :</label>
                                    <input name="harga" value="{{ old('harga') }}" required class="form-control form-control-solid @error('harga') is-invalid @enderror" type="text">
                                    @error('harga')
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
                                    <label for="exampleFormControlSelect1">Nama Supplier :</label>
                                    <select name="nama_supplier" class="form-control form-control-solid @error('nama_supplier') is-invalid @enderror" id="nama_supplier">
                                        @foreach ($nama_supplier as $data)
                                        <option>{{ $data -> nama_supplier }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <button class="btn btn-primary">Simpan</button>
                                </form>

                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@endsection
