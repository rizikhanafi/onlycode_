@extends('layouts.template')
@section('title','Pembeli')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pembeli</h1>
                    <p class="mb-4">Tambahkan pembeli dengan data real.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pembeli</h6>
                        </div>
                        <div class="card-body">
                            <form action="/pembeli/tambah/insert" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>ID :</label>
                                    <input name="id_pembeli" value="CUS" class="form-control form-control-solid @error('id_pembeli') is-invalid @enderror">
                                    @error('id_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Pembeli :</label>
                                    <input name="nama_pembeli" value="{{ old('nama_pembeli') }}" required class="form-control form-control-solid @error('nama_pembeli') is-invalid @enderror" type="text">
                                    @error('nama_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select class="form-control @error('jk') is-invalid @enderror" name="jk" id="jk">
                                        <option>L</option>
                                        <option>P</option>
                                    </select>
                                    @error('jk')
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
                                    <input name="alamat" value="{{ old('alamat') }}" required class="form-control form-control-solid @error('alamat') is-invalid @enderror" type="textarea">
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
