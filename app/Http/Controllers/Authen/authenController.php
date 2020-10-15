<?php

namespace App\Http\Controllers\Authen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserAccount;
use Session; 

class authenController extends Controller
{
	public function login()
	{
		if (Session::has('name')) {
    		return redirect()->route('hub');
    	} else {
    		return view('authen.login');
    	}
	}

    public function Authen(Request $request)
    {
    	$username = $request->get('username');
    	// $username = "thanathip.d";
		$data_search = UserAccount::where('userid','=', $username)->get();
		// dd($data_search[0]->username);
		// session(['name' => $data_search[0]->id]);
		Session::put('userid', $data_search[0]->userid);
		Session::put('name', $data_search[0]->username);
		Session::put('department', $data_search[0]->office_text);
		// session()->forget(['name']);
		return response()->json(['data_value'=> $data_search]);
    }
}
