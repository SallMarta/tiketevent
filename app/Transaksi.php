<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    // protected $primaryKey = 'id';
    // public $timestamps = true;

    protected $fillable = ['id_user', 'email_user', 'sub_total_order', 'total_pembayaran', 'status_pembayaran', 'waktu_order'];
}
