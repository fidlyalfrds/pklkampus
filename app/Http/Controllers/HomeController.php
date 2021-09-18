<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_keluar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // protected function dashboard()
    // {
    //     $Keluar = [];
    //     foreach (barang_keluar::all() as $Keluar) {
    //         array_push($Keluar, $Keluar->jumlah->count());
    //     }
    //     return view('dashboard', compact('Keluar'));
    // }
}
