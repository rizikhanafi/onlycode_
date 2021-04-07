@extends('layouts.template')
@section('title','Tentang')
@section('konten')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tentang Wildventory</h6>
        </div>
        <div class="card-body">
     <p>Wildventory adalah sebuah aplikasi inventori sederhana, fungsi dari Wildventory sendiri yaitu mengatur barang masuk dan barang keluar dari Supplier ke Customer.</p>

    <h3><b>Cara Menginstall</b></h3>
    <p>
    - Pastikan Laravel dan Composer terbaru sudah terinstall. <br>
    - Clone semua data dari git atau download Wildventory di github. <br>
    - Import database yang ada di dalam projek ini, nama databasenya wildventory.sql, pastikan sudah terinstall database SQL software. <br>
    - Buat dan setting .env baru kedalam projek. <br>
    - Generate key baru kedalam projek ini.
    </p>
    <p>Kontak pengembang untuk pemakaian aplikasi ini.</p>
            <a href="https://instagram.com/rizikhanafi" target="_blank" class="btn btn-secondary btn-block"><i class="fab fa-instagram fa-fw"></i>
                Instagram</a>
            <a href="https://github.com/rizikhanafi" target="_blank" class="btn btn-light btn-block"><i
                    class="fab fa-github fa-fw"></i> Github</a>

        </div>
    </div>

</div>

@endsection
