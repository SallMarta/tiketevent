<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    // protected $primaryKey = 'id';
    // public $timestamps = true;

    protected $fillable = ['id_tiket', 'id_transaksi', 'harga', 'qty'];
}
