<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = "detail_peminjaman";
    // protected $primaryKey = "id_buku";
    // public $incrementing = false;
    // protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_peminjaman","id_buku"
    ];
}
