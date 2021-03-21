<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SupplierModel extends Model
{
    public function allData() {
        return DB::table('supplier')->get();
   }

   public function addData($data) {
        return DB::table('supplier') -> insert($data);
    }

    public function deleteData($id_supplier) {
        return DB::table('supplier')->where('id_supplier', $id_supplier)->delete();
    }

    public function editData($id_supplier, $data){
    return DB::table('supplier')->where ('id_supplier', $id_supplier)->update($data);
    }

    public function detailData($id_supplier) {
        return DB::table('supplier')->where('id_supplier', $id_supplier)->first();
    }

}
