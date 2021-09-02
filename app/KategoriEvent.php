<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriEvent extends Model
{
    protected $table = 'kategorievent';
    // protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nama'];
}
