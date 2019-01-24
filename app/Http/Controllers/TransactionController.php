<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Member;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct(
        User $user, 
    	Member $member,
    	Buku $buku,
    	DetailPeminjaman $detail,
    	Peminjaman $peminjaman,
    	Pengembalian $pengembalian
    ){
        $this->user = $user;
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
    		->select('buku.id_buku','buku.judul_buku','peminjaman.tgl_peminjaman','peminjaman.tgl_kembali')
            ->where('member.id_member' ,'=',$id)
    		->get();

        // Member::join('peminjaman','member.id_member','=','peminjaman.id_member')
        //  ->join('detail_peminjaman','peminjaman.id_peminjaman','detail_peminjaman.id_peminjaman')
        //  ->join('buku','detail_peminjaman.id_buku','=','buku.id_buku')
        //  ->select('buku.id_buku','buku.judul_buku','peminjaman.tgl_peminjaman')
        //     ->where('member.id_member' ,'=',$id)
         // ->get();

    	if($data->count() != 0)
    	{
    		return Response()->json(['pengembalian' => true, 'result' => $data], 200);
    	}
    	return Response()->json(['pengembalian' => false], 200);
    }

    private function generateIdPeminjaman(){
        $id_peminjaman = 
            $this->peminjaman
            ->selectRaw("MAX(id_peminjaman) AS id_peminjaman")
            // ->whereDate("tgl_peminjaman", date("Y-m-d"))
            ->whereRaw("tgl_peminjaman = '".date("Y-m-d")."' OR id_peminjaman LIKE 'BRW-".date("Ymd")."%'")
            ->first();

        if($id_peminjaman->count() != 0){
            $id_peminjaman = $id_peminjaman["id_peminjaman"];
            $id_peminjaman = substr($id_peminjaman, 12);
            $id_peminjaman += 1;
            $id_peminjaman = substr("000", strlen($id_peminjaman)).$id_peminjaman;
            $id_peminjaman = "BRW-".date("Ymd").$id_peminjaman;
            return $id_peminjaman;
        }

        return "BRW-".date("Ymd")."001";
    }

    public function storePeminjaman(Request $request, $id){
        $params = $request->all();

        $user = $this->user->where("api_token","=",$params["api_token"])->first();
        $id_peminjaman = $this->generateIdPeminjaman();

        $dataPeminjaman = [
            "id_peminjaman" => $id_peminjaman,
            "id_member" => $id,
            "tgl_peminjaman" => date("Y-m-d"),
            "tgl_kembali" => $params["tgl_kembali"],
            "id_user" => $user->id_user,
        ];
        $status = $this->peminjaman->create($dataPeminjaman);
        if($status) {
            $data = explode(",", $params["id_buku"]);
            for($i = 0; $i < count($data); $i++) {
                $detailstatus = $this->detail->create([
                    "id_peminjaman" => $id_peminjaman,
                    "id_buku" => $data[$i]
                ]);
            }
        }

        if($status && $detailstatus)
            return response()->json(['result' => true], 200);

        return response()->json(['result' => false], 403);
    }
}
