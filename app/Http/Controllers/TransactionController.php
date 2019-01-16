<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class TransactionController extends Controller
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
    public function getMemberData($id){
    	$data = $this
    		->member
    		->join('peminjaman','member.id_member','=','peminjaman.id_member')
    		->join('detail_peminjaman','peminjaman.id_peminjaman','detail_peminjaman.id_peminjaman')
    		->join('buku','detail_peminjaman.id_buku','=','buku.id_buku')
    		->select('buku.id_buku','buku.judul_buku','peminjaman.tgl_peminjaman')
            ->where('member.id_member' ,'=',$id)
    		->get();

    	if($data->count() != 0)
    	{
    		return Response()->json(['pengembalian' => true, 'result' => $data], 200);
    	}
    	return Response()->json(['pengembalian' => false], 200);
    }
}
