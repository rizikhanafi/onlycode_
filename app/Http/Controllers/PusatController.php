<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\Paginator;

class PusatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Paginator::useBootstrap();
        $barang = DB::table('barang')->get()->count();
        $supplier = DB::table('supplier')->get()->count();
        $pembeli = DB::table('pembeli')->get()->count();
        $transaksi = DB::table('bayar')->get()->count();
        $nama_barang = DB::table('barang')->paginate(5);

        return view('pusat', compact('barang','supplier','pembeli','transaksi','nama_barang'));
    }
}
