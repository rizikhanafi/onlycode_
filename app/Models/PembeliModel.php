<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PembeliModel extends Model
{
    public function allData()
    {
        return DB::table('pembeli')->get();
    }

    public function addData($data) {
        return DB::table('pembeli')->insert($data);
    }
    
    public function deleteData($id_pembeli) {
        return DB::table('pembeli')->where('id_pembeli', $id_pembeli)->delete();
    }

    public function editData($id_pembeli, $data){
        return DB::table('pembeli')->where ('id_pembeli', $id_pembeli)->update($data);
    }
    
    public function detailData($id_pembeli) {
            return DB::table('pembeli')->where('id_pembeli', $id_pembeli)->first();
    }
}
