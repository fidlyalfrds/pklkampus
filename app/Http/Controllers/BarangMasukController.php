<?php

namespace App\Http\Controllers;

use App\barang_masuk;
use App\barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Masuk = barang_masuk::all();
        return view('barangmasuk.index',compact('Masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Masuk = barang_masuk::all();
        $Barang = barang::all();
        return view('barangmasuk.create',compact('Masuk','Barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Masuk = new barang_masuk;
        $Masuk->barang_id = $request->barang_id;
        $Masuk->tanggal_masuk = $request->tanggal_masuk;
        $Masuk->size_s = $request->size_s;
        $Masuk->size_m = $request->size_m;
        $Masuk->size_l = $request->size_l;
        $Masuk->size_xl = $request->size_xl;
        $Masuk->size_xxl = $request->size_xxl;
        $Masuk->total_stock = ($Masuk->size_s + $Masuk->size_m + $Masuk->size_l + $Masuk->size_xl + $Masuk->size_xxl); 
        $Masuk->save();
        return redirect()->route('barangmasuk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_masuk $barang_masuk)
    {
        //
    }
}
