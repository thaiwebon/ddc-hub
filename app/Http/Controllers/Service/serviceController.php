<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DBservice;
use App\DBdepartment;
use App\DBmenuservice;
use Session;
use redirect;

class serviceController extends Controller
{
    public function chkAuthen()
    {
    	if (Session::has('name')) {
    		$ServiceLoad = $this->ServiceLoad();
    		return $ServiceLoad;
    	} else {
    		return redirect()->route('index');
    	}
    }

    public function GetAllDataService()
    {
    	$query_service = DBservice::
    						select(
    								'service_id',
    								'data_date',
    								'name',
    								'department_id',
    								'menuservice_id',
    								'status'
    							)
    						->get();
		return $query_service;
    }

    public function GetDataDepartment()
    {
    	$query_department = DBdepartment::select('id','department_name')->get();

    	foreach ($query_department as $value_department) {
    		$department_ref[$value_department->id] = trim($value_department->department_name);
    	}

    	return $department_ref;
    }

    public function GetDataMenuService()
    {
    	$query_menuservice = DBmenuservice::select('id','service_name')->get();

    	foreach ($query_menuservice as $value_menuservice) {
    		$menuservice_ref[$value_menuservice->id] = trim($value_menuservice->service_name);
    	}

    	return $menuservice_ref;
    }

    public function InsertService()
    {

    }

    public function ServiceLoad()
    {
    	$data_department 	=	$this->GetDataDepartment();
    	$data_service		=	$this->GetAllDataService();
    	$data_menuservice	=	$this->GetDataMenuService();
    	$status = [
    				'0'	=>	'ยกเลิกการแจ้งซ่อม',
    				'1'	=>	'แจ้งซ่อม',
    				'2'	=>	'กำลังดำเนินการ',
    				'3'	=>	'เสร็จสิ้น'
    			];

    	return view('service.form',[
    		'data_service' 		=>	$data_service,
    		'data_department'	=>	$data_department,
    		'data_menuservice'	=>	$data_menuservice,
    		'data_status'		=>	$status
    	]);
    }
}