<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $table = "denda";
    protected $primaryKey = "id_denda";
    // public $incrementing = false;
    protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_peminjaman", "id_buku","bayar_denda","id_user"
    ];
}
