<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostumer extends Model
{
    protected $table = 'kostumer';
    protected $primaryKey = 'id_kostumer';
    protected $fillable = ['id_kostumer','nama_kostumer','email','no_tlp','provinsi','kota','alamat_lengkap'];
    public $timestamps = false;
}
