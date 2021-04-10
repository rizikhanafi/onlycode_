<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PembayaranModel extends Model
{

    public function addData($data) {
        return DB::table('bayar')->insert($data);
    }

    public function deleteData($id_bayar) {
        return DB::table('bayar')->where('id_bayar', $id_bayar)->delete();
    }
}
