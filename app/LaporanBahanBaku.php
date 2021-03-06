<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanBahanBaku extends Model
{
    protected $table = 'laporan_bahanBaku';
    protected $primaryKey = 'id_laporan_bahan';
    protected $fillable = ['id_laporan_bahan','nama_bahanBaku','created_at','updated_at','jumlah_penambahanBahan','jumlah_penguranganBahan','jumlah_bahanBaku'];
}
