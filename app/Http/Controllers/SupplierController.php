<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->SupplierModel = new SupplierModel();
    }

    public function supplier(){
        $data = [
            'nama_supplier' => $this->SupplierModel->allData(),
        ];
        return view('pemasok/pemasok', $data);
    }

    public function tambahsupplier(){
        return view ('pemasok/addpemasok');
    }

    public function insert(){
        Request()->validate([
            'id_supplier' => 'required|unique:supplier,id_supplier|min:4|max:5',
            'nama_supplier' => 'required',
            'no_telp' => 'required|min:12|max:14',
            'alamat' => 'required',
        ], [
            'id_supplier.min' => 'Masukan ID dari setidaknya 4 angka.',
            'id_supplier.max' => 'ID tidak boleh lebih dari 5 angka.',
            'id_supplier.unique' => 'ID sudah ada pada data.',
            'id_supplier.required' => 'ID harus diisi.',
            'no_telp.min' => 'No telepon minimal 12 angka.',
            'no_telp.max' => 'No telepon minimal 14 angka.',
        ]);

    $data = [
        'id_supplier' => Request()->id_supplier,
        'nama_supplier' => Request()->nama_supplier,
        'no_telp' => Request()->no_telp,
        'alamat' => Request()->alamat,
    ];
    $this->SupplierModel->addData($data);
   return redirect()->route('pemasoks')->with('pesan','Data sukses ditambahkan.');

}

    public function hapuss($id_supplier){
    $data = [
        'id_supplier' => Request()->id_supplier,
        'nama_supplier' => Request()->nama_supplier,
        'no_telp' => Request()->no_telp,
        'alamat' => Request()->alamat,
    ];
    $this->SupplierModel->deleteData($id_supplier, $data);
    return redirect()->route('pemasoks')->with('pesan','Data berhasil dihapus.');
}

//update
    public function update($id_supplier){
        Request()->validate([
            'id_supplier' => 'required',
            'nama_supplier' => 'required',
            'no_telp' => 'required|min:12|max:14',
            'alamat' => 'required',
        ]);

    $data = [
        'id_supplier' => Request()->id_supplier,
        'nama_supplier' => Request()->nama_supplier,
        'no_telp' => Request()->no_telp,
        'alamat' => Request()->alamat,
    ];
    $this->SupplierModel->editData($id_supplier, $data);
    return redirect()->route('pemasoks')->with('pesan','Data sukses diperbarui.');
    }

    public function ubah($id_supplier) {
        if (!$this->SupplierModel->detailData($id_supplier)) {
            abort(404);
        }
        $data = [
            'id_supplier' => $this->SupplierModel->detailData($id_supplier),
        ];
        return view('pemasok/ubahpemasok', $data);
    }
}
