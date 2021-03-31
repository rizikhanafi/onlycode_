<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\SupplierModel;

class BarangController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->BarangModel = new BarangModel();
        $this->SupplierModel = new SupplierModel();
    }

    public function barang()
    {
        $data = [
            'nama_barang' => $this->BarangModel->allData(),
        ];
        return view('penyimpanan/penyimpanan', $data);
    }

    public function tambahbarang(){
        $data = [
            'nama_supplier' => $this->SupplierModel->allData(),
        ];
        return view ('penyimpanan/addpenyimpanan', $data);
    }

    public function insert(){
        Request()->validate([
            'id_barang' => 'required|unique:barang,id_barang|min:4|max:5',
            'nama_barang' => 'required|unique:barang,nama_barang',
            'harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'stok' => 'required|min:1|max:3',
            'nama_supplier' => 'required',
        ], [
            'id_barang.min' => 'Masukan ID dari setidaknya 4 angka.',
            'id_barang.max' => 'ID tidak boleh lebih dari 5 angka.',
            'id_barang.unique' => 'ID sudah ada pada data.',
            'id_barang.required' => 'ID harus diisi.',
            'harga.regex' => 'Inputan harus berupa angka.',
            'stok.min' => 'No telepon minimal 12 angka.',
            'stok.max' => 'No telepon minimal 14 angka.',
        ]);

    $data = [
        'id_barang' => Request()->id_barang,
        'nama_barang' => Request()->nama_barang,
        'harga' => Request()->harga,
        'stok' => Request()->stok,
        'nama_supplier' => Request()->nama_supplier,
    ];
    $this->BarangModel->addData($data);
   return redirect()->route('barangs')->with('pesan','Data sukses ditambahkan.');

    }

    public function hapuss($id_barang){
        $data = [
            'id_barang' => Request()->id_barang,
            'nama_barang' => Request()->nama_barang,
            'harga' => Request()->harga,
            'stok' => Request()->stok,
            'nama_supplier' => Request()->nama_supplier,
        ];
    $this->BarangModel->deleteData($id_barang, $data);
    return redirect()->route('barangs')->with('pesan','Data berhasil dihapus.');
    }

    public function update($id_barang){
        Request()->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'stok' => 'required|min:1|max:3',
            'nama_supplier' => 'required',
        ]);

        $data = [
            'id_barang' => Request()->id_barang,
            'nama_barang' => Request()->nama_barang,
            'harga' => Request()->harga,
            'stok' => Request()->stok,
            'nama_supplier' => Request()->nama_supplier,
        ];
        $this->BarangModel->editData($id_barang, $data);
        return redirect()->route('barangs')->with('pesan','Data berhasil diperbarui.');
    }

    public function ubah($id_barang) {
        if (!$this->BarangModel->detailData($id_barang)) {
            abort(404);
        }
        $data = [
            'id_barang' => $this->BarangModel->detailData($id_barang),
            'nama_supplier' => $this->SupplierModel->allData(),
        ];
        return view('penyimpanan/ubahpenyimpanan', $data);
    }

    public function tambahstok() {
        Request()->validate([
            'id' => 'nullable',
            'nama_barang' => 'required',
            'stok' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'tgl' => 'required',
        ], [
            'tgl.required' => 'Tanggal harus diisi.',
            'stok.regex' => 'Inputan harus berupa angka.',
        ]);

    $data = [
        'id' => Request()->id,
        'nama_barang' => Request()->nama_barang,
        'stok' => Request()->stok,
        'tgl' => Request()->tgl,
    ];
    $this->BarangModel->tambahStok($data);
   return redirect()->route('barangs')->with('pesan','Data sukses ditambahkan.');

    }

}
