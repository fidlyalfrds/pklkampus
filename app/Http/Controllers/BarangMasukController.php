<?php

namespace App\Http\Controllers;

use App\barang_masuk;
use App\barang;
use App\Exports\MasukExport;
use Maatwebsite\Excel\Facades\Excel;
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

    public function export()
    {
        return Excel::download(new MasukExport, 'Barang Masuk.xlsx');
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
        $Barang = barang::where(['id' => $request['barang_id']])->first();
        // if($Barang){
        //     $S = $Barang->size_s + (int) $request->size_s;
        //     $M = $Barang->size_m + (int) $request->size_m;
        //     $L = $Barang->size_l + (int) $request->size_l;
        //     $XL = $Barang->size_xl + (int) $request->size_xl;
        //     $XXL = $Barang->size_xxl + (int) $request->size_xxl;
        //     // $total = $Barang->total_stock + (int) $request->total_stock;
        //     $Barang->update(['size_s' => $S, 'size_m' => $M, 'size_l' => $L, 'size_xl' => $XL, 'size_xxl' => $XXL]);
        // }
        $Masuk->barang_id = $request->barang_id;
        $Masuk->tanggal_masuk = $request->tanggal_masuk;
        $Masuk->size_s = $request->size_s;
        $Masuk->size_m = $request->size_m;
        $Masuk->size_l = $request->size_l;
        $Masuk->size_xl = $request->size_xl;
        $Masuk->size_xxl = $request->size_xxl;
        $Masuk->total_stock = ($Masuk->size_s + $Masuk->size_m + $Masuk->size_l + $Masuk->size_xl + $Masuk->size_xxl); 
        $Masuk->save();
        return redirect()->route('barangmasuk.index')->with('success', 'Data Berhasil Disimpan');
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
    public function destroy($id)
    {
        $Masuk = barang_masuk::findOrFail($id);
        $Masuk->delete();
        return redirect()->route('barangmasuk.index');
    }
}
