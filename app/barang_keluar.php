<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    protected $table = 'barang_keluars';
    protected $fillable =array('barang_id','nama_pembeli','tanggal_pembelian','size_s','size_m','size_l','size_xl','size_xxl','jumlah','harga','total');

    public function barang(){
    	return $this->belongsTo(barang::class,'barang_id','id');
	}
	// public function bahan(){
 //    	return $this->belongsTo(bahan::class,'bahan_id','id');
	// }
}
