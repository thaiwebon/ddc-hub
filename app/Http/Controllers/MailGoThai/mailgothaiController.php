<?php

namespace App\Http\Controllers\MailGoThai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class mailgothaiController extends Controller
{
    public function chkAuthen()
    {
    	if (Session::has('name')) {
            if (Session::get('lvs') == 3) {
                // $ServiceAdminLoad = $this->ServiceAdminLoad();
                // return $ServiceAdminLoad;
            } else {
                $MailGoThaiLoad = $this->MailGoThaiLoad();
                return $MailGoThaiLoad;
            }
    	} else {
    		return redirect()->route('index');
    	}
    }

    public function MailGoThaiLoad()
    {
    	
    }
}
