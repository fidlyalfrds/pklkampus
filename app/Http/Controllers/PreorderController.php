<?php

namespace App\Http\Controllers;

use App\preorder;
use App\Barang;
use App\Bahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Preorder = preorder::all();
        return view('preorder.index', compact('Preorder'));
        // if ($request->ajax()) {
        //     $data = preorder::with('barang')->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->editColumn('total', function ($row) {
        //             return 'Rp. ' . number_format($row->total, 0, '', '.') . ',-';
        //           })
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href='.route("editpreorder",["id"=>$row->id]).' class="edit btn btn-primary btn-sm ti-pencil"> Edit</a> <a href='.route("hapuspreorder",["id"=>$row->id]).' class="delete btn btn-danger btn-sm ti-trash">Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // return view('preorder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Preorder = preorder::all();
        return view('preorder.create',compact('Preorder','Bahan','Barang'));
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
            'nama_barang' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'tanggal_pemesanan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'deksripsi' => 'required',
            'jumlah_bayar' => 'required'
        ]);
        
        // $Barang = barang::where('id',$request->barang_id)->first();
        $Preorder = new preorder;
        $Preorder->nama = $request->nama;
        $Preorder->nama_barang = $request->nama_barang;
        $Preorder->telp = $request->telp;
        $Preorder->alamat = $request->alamat;
        $Preorder->tanggal_pemesanan = $request->tanggal_pemesanan;
        $Preorder->jumlah = $request->jumlah;  
        $Preorder->harga = $request->harga;
        $Preorder->deksripsi = $request->deksripsi;
        $Preorder->total = ($Preorder->jumlah * $Preorder->harga);
        $Preorder->jumlah_bayar = $request->jumlah_bayar;
        $Preorder->sisa = ($Preorder->total - $Preorder->jumlah_bayar);
        $Preorder->save();
        return redirect()->route('preorder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\preorder  $preorder
     * @return \Illuminate\Http\Response
     */
    public function show(preorder $preorder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\preorder  $preorder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Barang = barang::all();
        $Preorder = preorder::findOrFail($id);
        return view('preorder.edit',compact('Barang','Bahan','Preorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\preorder  $preorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'nama' => 'required',
        'nama_barang' => 'required',
        'telp'=>'required',
        'alamat' => 'required',
        'tanggal_pemesanan'=>'required',
        'jumlah'=>'required',
        'harga' => 'required',
        'deksripsi' => 'required',
        'jumlah_bayar' => 'required'
        ]);
        $Preorder = preorder::findOrFail($id);
        $Preorder->nama = $request->nama;
        $Preorder->nama_barang = $request->nama_barang;
        $Preorder->telp = $request->telp;
        $Preorder->alamat = $request->alamat;
        $Preorder->tanggal_pemesanan = $request->tanggal_pemesanan;
        $Preorder->jumlah = $request->jumlah;  
        $Preorder->harga = $request->harga;
        $Preorder->deksripsi = $request->deksripsi;
        $Preorder->total = ($Preorder->jumlah * $Preorder->harga);
        $Preorder->jumlah_bayar = $request->jumlah_bayar;
        $Preorder->sisa = ($Preorder->total - $Preorder->jumlah_bayar);
        $Preorder->save();
        return redirect()->route('preorder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\preorder  $preorder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Preorder = preorder::findOrFail($id);
        $Preorder->delete();
        return redirect()->route('preorder.index');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'Preorder.xlsx');
    }
}
