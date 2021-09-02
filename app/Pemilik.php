<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['id_user', 'nohp', 'pekerjaan', 'alamat_pemilik', 'kartu_identitas'];
}
