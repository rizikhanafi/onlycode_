@extends('layouts.template')
@section('title','Pembayaran')
@section('konten')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
    <p class="mb-4">Data pembayaran Wildventory.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Pembayaran</h6>
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
                                    <label for="exampleFormControlSelect1">Pembeli :</label>
                                    <select name="pembeli" class="form-control form-control-solid @error('pembeli') is-invalid @enderror" id="pembeli">
                                        @foreach ($pembeli as $data)
                                        <option>{{ $data -> nama_pembeli }}</option>
                                        @endforeach
                                    </select>
                                    @error('pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Barang :</label>
                                    <select name="barang" class="form-control form-control-solid @error('barang') is-invalid @enderror" id="barang">
                                        @foreach ($barang as $data)
                                        <option>{{ $data -> nama_barang }}</option>
                                        @endforeach
                                    </select>
                                    @error('barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="example-date-input">Tanggal Bayar :</label>

                                      <input class="form-control form-control-solid" type="date" value="2011-08-19" id="example-date-input">
                                    </div>


                                  <div class="form-group">
                                    <label>Total Beli:</label>
                                    <input name="total_beli" value="{{ old('total_beli') }}" required class="form-control form-control-solid @error('total_beli') is-invalid @enderror" type="text">
                                    @error('total_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label>Total Bayar :</label>
                                    <input name="total_bayar" value="{{ old('total_bayar') }}" required class="form-control form-control-solid @error('total_bayar') is-invalid @enderror" type="text">
                                    @error('total_bayar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label>Keterangan :</label>
                                    <input name="keterangan" value="{{ old('keterangan') }}" required class="form-control form-control-solid @error('keterangan') is-invalid @enderror" type="text">
                                    @error('keterangan')
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
