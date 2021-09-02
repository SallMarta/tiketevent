<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id_event', 'id_kategoritiket', 'harga', 'qty', 'tanggal_tiket', 'waktu_mulai', 'waktu_selesai', 'deskripsi'];
}
