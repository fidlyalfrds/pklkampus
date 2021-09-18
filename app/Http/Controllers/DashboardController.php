<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembelian;
use App\barang_keluar;
use App\preorder;
use App\barang;
use App\reseller;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$pembelian = DB::table('pembelians')->get()->count();
    	$keluar = DB::table('barang_keluars')->get()->count();
    	$po = DB::table('preorders')->get()->count();
    	$resel = DB::table('resellers')->get()->count();
    	$barang = DB::table('barangs')->get()->count();
    	return view('dashboard', compact('pembelian','keluar','po','resel','barang'));
    }
}
