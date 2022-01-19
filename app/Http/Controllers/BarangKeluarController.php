<?php

namespace App\Http\Controllers;

use App\barang;
use App\bahan;
use App\barang_keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Exports\KeluarExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Keluar = barang_keluar::with('barang')->get();
        return view('barangkeluar.index', compact('Keluar'));
        // if ($request->ajax()) {
        //     $data = barang_keluar::with('barang')->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href='.route("editbarangkeluar",["id"=>$row->id]).' class="edit btn btn-primary btn-sm ti-pencil"> Edit</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('barangkeluar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Keluar = barang_keluar::all();
        $Barang = barang::all();
        return view('barangkeluar.create',compact('Keluar','Barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id' => ['required'],
            'nama_pembeli' => ['required'],
            'tanggal_pembelian' => ['required'],
            'size_s' => ['nullable'],
            'size_m' => ['nullable'],
            'size_l' => ['nullable'],
            'size_xl' => ['nullable'],
            'size_xxl' => ['nullable']
        ]);

        // $Barang = barang::where('id',$request->barang_id)->first();
        // dd($Barang);
        $Keluar = new barang_keluar;
        $Barang = barang::where(['id' => $request['barang_id']])->first();
        // if($Barang){
        //     $S = $Barang->size_s - (int) $request->size_s;
        //     $M = $Barang->size_m - (int) $request->size_m;
        //     $L = $Barang->size_l - (int) $request->size_l;
        //     $XL = $Barang->size_xl - (int) $request->size_xl;
        //     $XXL = $Barang->size_xxl - (int) $request->size_xxl;
        //     // $total = $Barang->total_stock - (int) $request->jumlah;
        //     $Barang->update(['size_s' => $S, 'size_m' => $M, 'size_l' => $L, 'size_xl' => $XL, 'size_xxl' => $XXL]);
        // }

        $Keluar->barang_id = $request->barang_id;
        $Keluar->nama_pembeli = $request->nama_pembeli;
        $Keluar->tanggal_pembelian = $request->tanggal_pembelian;
        $Keluar->size_s = $request->size_s;
        $Keluar->size_m = $request->size_m;
        $Keluar->size_l = $request->size_l;
        $Keluar->size_xl = $request->size_xl;
        $Keluar->size_xxl = $request->size_xxl;
        $Keluar->jumlah = ($Keluar->size_s + $Keluar->size_m + $Keluar->size_l + $Keluar->size_xl + $Keluar->size_xxl);
        $Keluar->harga = $Barang->harga;
        $Keluar->total=($Keluar->jumlah * $Keluar->harga);
        $Keluar->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Data Berhasil Disimpan');
        // $StatusSave = true;
        // if ($request->size_s > $Barang->size_s){
        //     $StatusSave = false;
        // }
        // if ($request->size_m > $Barang->size_m){
        //     $StatusSave = false;
        // }
        // if ($request->size_l > $Barang->size_l){
        //     $StatusSave = false;
        // }
        // if ($request->size_xl > $Barang->size_xl){
        //     $StatusSave = false;
        // }
        // if ($request->size_xxl > $Barang->size_xxl){
        //     $StatusSave = false;
        // }
        // if ($StatusSave){
        //     $request->save();
        //     return redirect()->route('barangkeluar.index')->with('success', 'Data Berhasil Disimpan');
        // } else {
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(barang_keluar $barang_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_keluar $barang_keluar, $id)
    {
        $Keluar = barang_keluar::findOrFail($id);
        $Barang = barang::all();
        return view('barangkeluar.edit',compact('Keluar','Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
        // 'barang_id' => 'required',
        'nama_pembeli' => 'required',
        'tanggal_pembelian'=>'required',
        'size_s' => 'required',
        'size_m' => 'required',
        'size_l' => 'required',
        'size_xl' => 'required',
        'size_xxl' => 'required'
        ]);

        $Keluar = barang_keluar::findOrFail($id);
        $Keluar->nama_pembeli = $request->nama_pembeli;
        $Keluar->tanggal_pembelian = $request->tanggal_pembelian;
        $Keluar->size_s = $request->size_s;
        $Keluar->size_m = $request->size_m;
        $Keluar->size_l = $request->size_l;
        $Keluar->size_xl = $request->size_xl;
        $Keluar->size_xxl = $request->size_xxl;
        $Keluar->jumlah = ($Keluar->size_s + $Keluar->size_m + $Keluar->size_l + $Keluar->size_xl + $Keluar->size_xxl);
        $Keluar->total=($Keluar->jumlah * $Keluar->harga);  
        $Keluar->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_keluar $barang_keluar)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new KeluarExport, 'Barang Keluar.xlsx');
    }
}
