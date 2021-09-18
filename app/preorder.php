<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preorder extends Model
{
    protected $table = 'preorders';
    protected $fillable =array('nama','nama_barang','alamat','telp',
    	'tanggal_pemesanan','jumlah','harga','deksripsi','total','jumlah_bayar','sisa');

 //    public function barang(){
 //    	return $this->belongsTo(barang::class,'barang_id','id');
	// }
	// public function bahan(){
 //    	return $this->belongsTo(bahan::class,'bahan_id','id');
	// }
}
