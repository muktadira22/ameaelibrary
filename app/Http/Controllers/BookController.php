<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BookController extends Controller
{
     public function __construct(Buku $buku){
   		$this->buku = $buku;
    }

    // API GET ALL MEMBER DATA
    public function index(){
    	$data = $this->buku->all();
    	return Response()->json(["result" => $data], 200);
    }
}
