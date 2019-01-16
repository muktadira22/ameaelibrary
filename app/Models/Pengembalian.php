<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = "pengenmbalian";
    protected $primaryKey = "id_pengenmbalian";
    public $incrementing = false;
    protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_pengembalian","tgl_kembali","denda","id_user"
    ];
}
