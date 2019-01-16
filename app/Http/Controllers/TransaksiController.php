<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class TransaksiController extends Controller
{
    public function __construct(
    	Member $member,
    	Buku $buku,
    	DetailPeminjaman $detail,
    	Peminjaman $peminjaman,
    	Pengembalian $pengembalian
    ){
    	$this->member = $member;
    	$this->buku = $buku;
    	$this->detail = $detail;
    	$this->peminjaman = $peminjaman;
    	$this->pengembalian = $pengembalian;
    }

    // API TRANSACTION GET ALL MEMBER DATA
    public function getMemberData(){
    	
    }
}
