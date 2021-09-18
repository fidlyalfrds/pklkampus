<?php

namespace App\Http\Controllers;

use App\pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Exports\PembelianExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Pembelian = pembelian::all();
        return view('pembelian.index',compact('Pembelian'));

        // if ($request->ajax()) {
        //     $data = pembelian::latest()->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href='.route("editpembelian",["id"=>$row->id]).' class="edit btn btn-primary btn-sm ti-pencil"> Edit</a> <a href='.route("hapuspembelian",["id"=>$row->id]).' class="delete btn btn-danger btn-sm ti-trash"> Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('pembelian.index');
    }

    public function export() 
    {
        return Excel::download(new PembelianExport, 'Pembelian.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Pembelian = pembelian::all();
        return view('pembelian.create',compact('Pembelian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|min:1',
            'harga' => 'required',
            'tanggal_beli' => 'required'
        ]);

        $Pembelian = new pembelian;
        $Pembelian->nama = $request->nama;
        $Pembelian->jumlah = $request->jumlah;
        $Pembelian->harga = $request->harga;
        $Pembelian->total=($Pembelian->jumlah * $Pembelian->harga);
        $Pembelian->tanggal_beli = $request->tanggal_beli;
        $Pembelian->save();
        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Pembelian = pembelian::findOrFail($id);
        return view('pembelian.edit',compact('Pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nama' => 'required',
        'jumlah' => 'required',
        'harga'=>'required',
        'tanggal_beli' => 'required'
        ]);
        $Pembelian = pembelian::findOrFail($id);
        $Pembelian->nama = $request->nama;
        $Pembelian->jumlah = $request->jumlah;
        $Pembelian->harga = $request->harga;
        $Pembelian->total=($Pembelian->jumlah * $Pembelian->harga);
        $Pembelian->tanggal_beli = $request->tanggal_beli;
        $Pembelian->save();
        return redirect()->route('pembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pembelian = pembelian::findOrFail($id);
        $Pembelian->delete();
        return redirect()->route('pembelian.index');
    }
}
