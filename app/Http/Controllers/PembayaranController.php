<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use App\Models\PembeliModel;
use App\Models\BarangModel;

class PembayaranController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->PembayaranModel = new PembayaranModel;
        $this->PembeliModel = new PembeliModel;
        $this->BarangModel = new BarangModel;
    }

    public function bayar() {
        $data = [
            'nama' => $this->PembayaranModel->allData(),
        ];
        return view('pembayaran/bayar', $data);
    }

    public function tambahbayar(){
        $data = [
            'pembeli' => $this->PembeliModel->allData(),
            'barang' => $this->BarangModel->allData(),
        ];
        return view('pembayaran/addbayar', $data);
    }
}
