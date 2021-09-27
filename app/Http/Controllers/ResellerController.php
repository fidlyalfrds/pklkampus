<?php

namespace App\Http\Controllers;

use App\reseller;
use App\barang;
use App\Exports\ResellerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Reseller = reseller::with('barang')->get();
        return view('reseller.index', compact('Reseller'));
    }

    public function export()
    {
        return Excel::download(new ResellerExport, 'Reseller.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Reseller = reseller::all();
        $Barang = barang::all();
        return view('reseller.create',compact('Reseller','Barang'));
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
            'nama_reseller' => 'required',
            'barang_id' => 'required',
            'stock_awal' => 'required',
            'terjual' => 'required'
        ]);

        $Reseller = new reseller;
        $Reseller->nama_reseller = $request->nama_reseller;
        $Reseller->barang_id = $request->barang_id;
        $Reseller->stock_awal = $request->stock_awal;
        $Reseller->terjual = $request->terjual;
        $Reseller->stock_akhir=($Reseller->stock_awal - $Reseller->terjual);
        $Reseller->save();
        return redirect()->route('reseller.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function show(reseller $reseller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Reseller = reseller::findOrFail($id);
        $Barang = barang::all();
        return view('reseller.edit',compact('Reseller','Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nama_reseller' => 'required',
        'barang_id' => 'required',
        'stock_awal'=>'required',
        'terjual' => 'required'
        ]);
        $Reseller = reseller::findOrFail($id);
        $Reseller->nama_reseller = $request->nama_reseller;
        $Reseller->barang_id = $request->barang_id;
        $Reseller->stock_awal = $request->stock_awal;
        $Reseller->terjual = $request->terjual;
        $Reseller->stock_akhir=($Reseller->stock_awal - $Reseller->terjual);
        $Reseller->save();
        return redirect()->route('reseller.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reseller  $reseller
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Reseller = reseller::findOrFail($id);
        $Reseller->delete();
        return redirect()->route('reseller.index');
    }
}
