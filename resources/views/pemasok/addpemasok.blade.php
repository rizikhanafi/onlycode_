@extends('layouts.template')
@section('title','Pemasok')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pemasok</h1>
                    <p class="mb-4">Tambahkan pemasok dengan data real.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pemasok</h6>
                        </div>
                        <div class="card-body">
                            <form action="/pemasok/tambah/insert" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label>ID :</label>
                                    <input name="id_supplier" value="{{ old('id_supplier') }}" class="form-control form-control-solid @error('id_supplier') is-invalid @enderror">
                                    @error('id_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama Supplier :</label>
                                    <input name="nama_supplier" value="{{ old('nama_supplier') }}" required class="form-control form-control-solid @error('nama_supplier') is-invalid @enderror" type="text">
                                    @error('nama_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Telepon :</label>
                                    <input name="no_telp" value="{{ old('no_telp') }}" required class="form-control form-control-solid @error('no_telp') is-invalid @enderror" type="text">
                                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat :</label>
                                    <input name="alamat" value="{{ old('alamat') }}" required class="form-control form-control-solid @error('alamat') is-invalid @enderror" type="text">
                                    @error('alamat')
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
