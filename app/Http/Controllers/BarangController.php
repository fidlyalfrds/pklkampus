<?php

namespace App\Http\Controllers;

use App\barang;
use App\barang_keluar;
use App\barang_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $Barang = barang::select('barangs.id','nama_barang','harga','size_s','size_m','size_l','size_xl','size_xxl','total_stock',
        //     db::raw('(size_s) + (size_m) + (size_l) + (size_xl) + (size_xxl) as total_stock'))->get();
        // return view('barang.index', compact('Barang'));

        $Barang = barang::select('barangs.id','nama_barang','harga','total_stock',
            db::raw('(barangs.size_s) - ifnull(barang_keluars.size_s,0) + ifnull(barang_masuks.size_s,0)  as size_s'),
            db::raw('(barangs.size_m) - ifnull(barang_keluars.size_m,0) + ifnull(barang_masuks.size_m,0)  as size_m'),
            db::raw('(barangs.size_l) - ifnull(barang_keluars.size_l,0) + ifnull(barang_masuks.size_l,0)  as size_l'),
            db::raw('(barangs.size_xl) - ifnull(barang_keluars.size_xl,0) + ifnull(barang_masuks.size_xl,0)  as size_xl'),
            db::raw('(barangs.size_xxl) - ifnull(barang_keluars.size_xxl,0) + ifnull(barang_masuks.size_xxl,0)  as size_xxl'),
            db::raw('(barangs.size_s) - ifnull(barang_keluars.size_s,0) + ifnull(barang_masuks.size_s,0) + (barangs.size_m) - ifnull(barang_keluars.size_m,0) + ifnull(barang_masuks.size_m,0) + (barangs.size_l) - ifnull(barang_keluars.size_l,0) + ifnull(barang_masuks.size_l,0) + (barangs.size_xl) - ifnull(barang_keluars.size_xl,0) + ifnull(barang_masuks.size_xl,0) + (barangs.size_xxl) - ifnull(barang_keluars.size_xxl,0) + ifnull(barang_masuks.size_xxl,0)    as total_stock'))

                ->leftJoin(db::raw('(select barang_id, sum(size_s) size_s,
                sum(size_m) size_m,
                sum(size_l) size_l,
                sum(size_xl) size_xl,
                sum(size_xxl) size_xxl,
                sum(jumlah) jumlah from barang_keluars group by barang_id) barang_keluars'), 
                function($join){
                    $join->on('barangs.id', '=', 'barang_keluars.barang_id');
                })
                
                ->leftJoin(db::raw('(select barang_id, sum(size_s) size_s,
                sum(size_m) size_m,
                sum(size_l) size_l,
                sum(size_xl) size_xl,
                sum(size_xxl) size_xxl
                from barang_masuks group by barang_id) barang_masuks'), 
                function($join){
                    $join->on('barangs.id', '=', 'barang_masuks.barang_id');
                })->get();
                // dd($Barang);
        return view('barang.index', compact('Barang'));
        //https://stackoverflow.com/questions/67346233/laravel-update-stock-value-after-order-placement
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'Barang Stock.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Barang = barang::all();
        return view('barang.create',compact('Barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Barang = new barang;
        $Barang->nama_barang = $request->nama_barang;
        $Barang->harga = $request->harga;
        $Barang->size_s = $request->size_s;
        $Barang->size_m = $request->size_m;
        $Barang->size_l = $request->size_l;
        $Barang->size_xl = $request->size_xl;
        $Barang->size_xxl = $request->size_xxl;
        $Barang->total_stock = ($Barang->size_s + $Barang->size_m + $Barang->size_l + $Barang->size_xl + $Barang->size_xxl);
        $Barang->save();
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Barang = barang::findOrFail($id);
        return view('barang.edit',compact('Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nama_barang' => 'required',
        'harga' => 'required'

        ]);
        $Barang = barang::findOrFail($id);
        $Barang->nama_barang = $request->nama_barang;
        $Barang->harga = $request->harga;
        $Barang->total_stock = ($Barang->size_s + $Barang->size_m + $Barang->size_l + $Barang->size_xl + $Barang->size_xxl);
        $Barang->save();
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Barang = barang::findOrFail($id);
        $Barang->delete();
        return redirect()->route('barang.index');
    }

    public function search(Request $request)
    {
    //     $Barang = search::paginate(2);
    //     return view ('barang.index',compact('Barang'));
    //     $search = $request->search;
    // } else {
    //     $Barang = barang::where('nama_barang', 'LIKE', '%' . $request->search . '%');
    //     return view('barang.index', compact('Barang'));
    }
}
