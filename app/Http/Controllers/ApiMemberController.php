<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class ApiMemberController extends Controller
{
   public function __construct(Member $member){
   		$this->member = $member;
    }

    // API GET ALL MEMBER DATA
    public function index(){
    	$data = $this->member->all();
    	return Response()->json(["result" => $data], 200);
    }
}
