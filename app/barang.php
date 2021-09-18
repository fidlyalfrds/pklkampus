<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barangs';
    protected $fillable =array('nama_barang','harga','size_s','size_m','size_l','size_xl','size_xxl','total_stock');

	public function barang_keluar(){
    	return $this->hasmany('App\barang_keluar');
	}

	public function barang_masuk(){
    	return $this->hasmany('App\barang_masuk');
	}

	public function reseller(){
    	return $this->hasmany('App\reseller');
	}
}
