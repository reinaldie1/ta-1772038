<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanTas extends Model
{
    protected $table = 'laporan_tas';
    protected $primaryKey = 'id_laporan_tas';
    protected $fillable = ['id_laporan_tas','nama_tas','harga_tas','gambar_tas','status_tas','created_at','updated_at'];
}
