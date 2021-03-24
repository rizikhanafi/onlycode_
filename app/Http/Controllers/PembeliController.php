<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembeliModel;

class PembeliController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->PembeliModel = new PembeliModel();
    }

    public function pembeli()
    {
        $data = [
            'pembeli' => $this->PembeliModel->allData(),
        ];
        return view('pembeli/pembeli', $data);
    }

    public function tambahpembeli() {
        return view('pembeli/addpembeli');
    }

    public function insert(){
        Request()->validate([
            'id_pembeli' => 'required|unique:pembeli,id_pembeli|min:4|max:5',
            'nama_pembeli' => 'required|unique:pembeli,nama_pembeli',
            'jk' => 'required',
            'no_telp' => 'required|min:12|max:14',
            'alamat' => 'required',
        ], [
            'id_pembeli.min' => 'Masukan ID dari setidaknya 4 angka.',
            'id_pembeli.max' => 'ID tidak boleh lebih dari 5 angka.',
            'id_pembeli.unique' => 'ID sudah ada pada data.',
            'id_pembeli.required' => 'ID harus diisi.',
            'no_telp.min' => 'No telepon minimal 12 angka.',
            'no_telp.max' => 'No telepon minimal 14 angka.',
        ]);

    $data = [
        'id_pembeli' => Request()->id_pembeli,
        'nama_pembeli' => Request()->nama_pembeli,
        'jk' => Request()->jk,
        'no_telp' => Request()->no_telp,
        'alamat' => Request()->alamat,
    ];
    $this->PembeliModel->addData($data);
   return redirect()->route('pembelis')->with('pesan','Data sukses ditambahkan.');
    }

    public function hapuss($id_pembeli){
        $data = [
            'id_pembeli' => Request()->id_pembeli,
            'nama_pembeli' => Request()->nama_pembeli,
            'jk' => Request()->jk,
            'no_telp' => Request()->no_telp,
            'alamat' => Request()->alamat,
        ];
        $this->PembeliModel->deleteData($data);
       return redirect()->route('pembelis')->with('pesan','Data berhasil dihapus.');
    }

    public function update($id_pembeli){
        Request()->validate([
            'id_pembeli' => 'required',
            'nama_pembeli' => 'required',
            'jk' => 'required',
            'no_telp' => 'required|min:12|max:14',
            'alamat' => 'required',
        ]);

        $data = [
            'id_pembeli' => Request()->id_pembeli,
            'nama_pembeli' => Request()->nama_pembeli,
            'jk' => Request()->jk,
            'no_telp' => Request()->no_telp,
            'alamat' => Request()->alamat,
        ];
        $this->PembeliModel->editData($id_pembeli, $data);
        return redirect()->route('pembelis')->with('pesan','Data berhasil diperbarui.');
    }

    public function ubah($id_pembeli) {
        if (!$this->PembeliModel->detailData($id_pembeli)) {
            abort(404);
        }
        $data = [
            'id_pembeli' => $this->PembeliModel->detailData($id_pembeli),
        ];
        return view('pembeli/ubahpembeli', $data);
    }

}
