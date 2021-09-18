<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    protected $table = 'barang_masuks';
    protected $fillable =array('barang_id','tanggal_masuk','size_s','size_m','size_l','size_xl','size_xxl','total_stock');

    public function barang(){
    	return $this->belongsTo(barang::class,'barang_id','id');
	}
}
