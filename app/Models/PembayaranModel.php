<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PembayaranModel extends Model
{
    public function allData() {
        return DB::table('bayar')->get();
    }

    public function addData($data) {
        return DB::table('bayar')->insert($data);
    }
}
