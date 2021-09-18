<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reseller extends Model
{
    protected $table = 'resellers';
    protected $fillable =array('nama_reseller','barang_id','stock_awal','terjual','stock_akhir');

    public function barang(){
    	return $this->belongsTo(barang::class,'barang_id','id');
	}
}
