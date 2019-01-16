<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id_buku";
    public $incrementing = false;
    protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_buku","judul_buku", "id_catalog","pengarang","tahun_terbit","penerbit"
    ];
}
