<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    protected $table = 'pembelians';
    protected $fillable = array('nama','jumlah','harga','total','tanggal_beli');
}
