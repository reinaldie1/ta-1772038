<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TasRajut extends Model
{
    protected $table = 'tasRajut';
    protected $primaryKey = 'id_tas';
    protected $fillable = ['id_tas','nama_tas','harga_tas','gambar_tas','status_tas'];
    public $timestamps = false;

    public static function getTas($id_tas){
        $data = DB::table('tasRajut')
        ->where('id_tas', $id_tas)
        ->get();

        return $data;
    }
}
