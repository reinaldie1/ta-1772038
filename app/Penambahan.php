<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penambahan extends Model
{
    protected $table = 'penambahan';
    protected $primaryKey = 'id_tambah';
    protected $fillable = ['tambah'];
    public $timestamps = false;
}
