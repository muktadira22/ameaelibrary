<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $primaryKey = "id_peminjaman";
    public $incrementing = false;
    protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_peminjaman","tgl_peminjaman","id_member","tgl_kembali","id_user"
    ];
}
