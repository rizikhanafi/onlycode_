<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembayaranModel;
use App\Models\PembeliModel;
use App\Models\BarangModel;
use DB;
use Illuminate\Pagination\Paginator;

class PembayaranController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->PembayaranModel = new PembayaranModel;
        $this->PembeliModel = new PembeliModel;
        $this->BarangModel = new BarangModel;
    }

    public function bayar() {
        Paginator::useBootstrap();
        $bayar = DB::table('bayar')->paginate(5);
        return view('pembayaran/bayar', compact('bayar'));
    }

    public function tambahbayar(){
        $data = [
            'pembeli' => $this->PembeliModel->allData(),
        ];
        $datas = [
            'barang' => $this->BarangModel->allData(),
        ];
        return view('pembayaran/addbayar', $data, $datas);
    }

    public function insert(){
        Request()->validate([
            'id_bayar' => 'nullable',
            'pembeli' => 'required',
            'nama_barang' => 'required',
            'tanggal_bayar' => 'required|date|after:yesterday',
            'total_beli' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'keterangan' => 'required',
        ], [
            'tanggal_bayar.required' => 'Tanggal harus diisi.',
            'total_beli.regex' => 'Inputan harus berupa angka.',
        ]);

    $datai = [
        'id_bayar' => Request()->id_bayar,
        'pembeli' => Request()->pembeli,
        'nama_barang' => Request()->nama_barang,
        'tanggal_bayar' => Request()->tanggal_bayar,
        'total_beli' => Request()->total_beli,
        'keterangan' => Request()->keterangan,
    ];
    $this->PembayaranModel->addData($datai);
   return redirect()->route('bayars')->with('pesan','Transaksi berhasil.');

    }

    public function hapuss($id_bayar){
        $data = [
        'id_bayar' => Request()->id_bayar,
        'pembeli' => Request()->pembeli,
        'nama_barang' => Request()->nama_barang,
        'tanggal_bayar' => Request()->tanggal_bayar,
        'total_beli' => Request()->total_beli,
        'keterangan' => Request()->keterangan,
        ];
        $this->PembayaranModel->deleteData($data);
       return redirect()->route('bayars')->with('pesan','Data berhasil dihapus.');
    }
}
