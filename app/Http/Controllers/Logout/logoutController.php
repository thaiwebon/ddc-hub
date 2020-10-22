<?php

namespace App\Http\Controllers\Logout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class logoutController extends Controller
{
    public function LogOut()
    {
    	session()->forget('userid');
    	session()->forget('name');
    	session()->forget('department');
    	session()->forget('lvs');
		session()->flush();
		return redirect()->route('index');
    }
}
