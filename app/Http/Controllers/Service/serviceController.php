<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use redirect;

class serviceController extends Controller
{
    public function chkAuthen()
    {
    	if (Session::has('name')) {
    		return view('service.form');
    	} else {
    		return redirect()->route('index');
    	}
    }


}
