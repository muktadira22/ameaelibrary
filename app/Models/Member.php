<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";
    protected $primaryKey = "id_member";
    public $incrementing = false;
    protected $keyType = "string";
    // public $timestamps = false;
    protected $fillable = [
    	"id_member","nama", "tgl_lahir","alamat","jenis_kelamin","pekerjaan","tgl_gabung","photo"
    ];
}
