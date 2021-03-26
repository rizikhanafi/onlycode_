<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PusatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang = DB::table('barang')->get()->count();
        $supplier = DB::table('supplier')->get()->count();
        $pembeli = DB::table('pembeli')->get()->count();
        $transaksi = DB::table('bayar')->get()->count();

        return view('pusat', compact('barang','supplier','pembeli','transaksi'));
    }
}
