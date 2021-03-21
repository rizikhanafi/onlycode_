<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\SupplierModel;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

}
