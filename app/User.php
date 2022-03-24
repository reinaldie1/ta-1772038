<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_user', 'username', 'password',  'id_role'];
    protected $hidden = ['password'];
    public $timestamps = false;
}
