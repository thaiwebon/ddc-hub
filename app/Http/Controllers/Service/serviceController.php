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
    		$getdata = $this->GetData();
    		return $getdata;
    	} else {
    		return redirect()->route('index');
    	}
    }

    public function GetData()
    {
  //   	$data_query = DBformRepair::join('db_menurepair', 'db_formrepair.menurepair_id', '=' , 'db_menurepair.id')
		// 				->where('status', 'แจ้งซ่อม')
		// 				->orWhere('status', 'กำลังดำเนินการ')
		// 				->get(
		// 						[
		// 							'db_formrepair.id',
		// 							'db_formrepair.name',
		// 							'db_formrepair.department',
		// 							'db_formrepair.data_date',
		// 							'db_formrepair.data_time',
		// 							'db_menurepair.name AS repairName',
		// 							'db_formrepair.status'
		// 						]
		// 					);
		// // dd($data_query);

		// $data_menurepair = DBmenuRepair::all();

		// return view ('service.formpage',
		// 				[
		// 					'data' 		=> $data_query,
		// 					'data_menu'	=> $data_menurepair
		// 				]
		// 			);
		// dd("test");
		return view ('service.form');
    }
}