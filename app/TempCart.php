<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempCart extends Model
{
    protected $table = 'temp_cart';
    protected $primaryKey = 'id_cart';
    protected $fillable = ['id_cart','nama_kostumer','nama_tas','harga_tas','gambar_tas','id_user'];
    protected $timestamps = false;
}
