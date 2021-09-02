<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriTiket extends Model
{
    protected $table = 'kategoritiket';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nama'];
}
