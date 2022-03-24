<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
   protected $table = 'bahanBaku' ;
   protected $primaryKey = 'nama_bahanBaku' ;
   protected $fillable = ['nama_bahanBaku','jumlah_bahanBaku'];
   public $timestamps = false ;
}
