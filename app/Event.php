<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id_pemilik', 'id_kategorievent', 'nama_event', 'deskripsi', 'nama_tempat', 'alamat_event', 'tanggal_mulai', 'tanggal_selesai', 'poster_event', 'syarat_ketentuan', 'foto_venue', 'dokumen', 'jenis_event', 'npwp', 'status'];
}
