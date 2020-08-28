<?php

namespace App\Http\Controllers\Hub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use redirect;

class hubController extends Controller
{
	public function chkAuthen()
	{
		if (Session::has('name')) {
    		return view('hub.hub');
    	} else {
    		return redirect()->route('index');
    	}
	}
}
