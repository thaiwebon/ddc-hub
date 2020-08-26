<?php

namespace App\Http\Controllers\Authen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserAccount;

class authenController extends Controller
{
    public function Authen(Request $request)
    {
    	$username = $request->get('username');
		$data_search = UserAccount::where('userid','=', $username)->get();
		// dd($data_search);
		// Session::put('variableName', $data_search);
		// Session::get('variableName');
		return response()->json(['data_value'=> $data_search]);
    }
}
