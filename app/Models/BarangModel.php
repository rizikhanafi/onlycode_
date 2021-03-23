<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    public function allData()
    {
        return DB::table('barang')->get();
    }

    public function addData($data) {
        return DB::table('barang') -> insert($data);
    }

    public function deleteData($id_barang) {
        return DB::table('barang')->where('id_barang', $id_barang)->delete();
    }

    public function editData($id_barang, $data){
        return DB::table('barang')->where ('id_barang', $id_barang)->update($data);
    }
    
    public function detailData($id_barang) {
            return DB::table('barang')->where('id_barang', $id_barang)->first();
    }
}
