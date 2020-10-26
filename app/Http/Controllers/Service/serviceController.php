<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DBservice;
use App\DBdepartment;
use App\DBmenuservice;
use App\DBstaff;
use Session;
use redirect;

class serviceController extends Controller
{
    public function chkAuthen()
    {
    	if (Session::has('name')) {
            if (Session::get('lvs') == 3) {
                $ServiceAdminLoad = $this->ServiceAdminLoad();
                return $ServiceAdminLoad;
            } else {
                $ServiceLoad = $this->ServiceLoad();
                return $ServiceLoad;
            }
    	} else {
    		return redirect()->route('index');
    	}
    }

    public function GetAllDataService()
    {
    	$userid = Session::get('userid');
    	$query_all_service = DBservice::
        						select(
        							'service_id',
                                    'data_date',
                                    'name',
                                    'department',
                                    'tel',
                                    'building',
                                    'floor',
                                    'menuservice_id',
                                    'description',
                                    'picture',
                                    'staff_id',
                                    'data_date_start',
                                    'data_date_success',
                                    'comment',
                                    'status',
                                    'data_date_cancel'
        						)
        						->get();
		return $query_all_service;
    }

    public function GetUserDataService()
    {
        $userid = Session::get('userid');
        $query_user_service = DBservice::
                                select(
                                    'service_id',
                                    'data_date',
                                    'name',
                                    'department',
                                    'menuservice_id',
                                    'status'
                                )
                                ->where('userid',Session::get('userid'))
                                ->get();
        return $query_user_service;
    }

    public function GetDataMenuService()
    {
    	$query_menuservice = DBmenuservice::select('id','service_name')->get();

    	foreach ($query_menuservice as $value_menuservice) {
    		$menuservice_ref[$value_menuservice->id] = trim($value_menuservice->service_name);
    	}

    	return $menuservice_ref;
    }

    public function GetDataStaff()
    {
        $query_staff = DBstaff::select('id','name')->get();

        foreach ($query_staff as $value_staff) {
            $staff_ref[$value_staff->id] = trim($value_staff->name);
        }

       return $staff_ref;
    }

    public function GetDataViewService(int $value)
    {
        $query_service = DBservice::
                            select(
                                'service_id',
                                'data_date',
                                'name',
                                'department',
                                'tel',
                                'building',
                                'floor',
                                'menuservice_id',
                                'description',
                                'picture',
                                'staff_id',
                                'data_date_start',
                                'data_date_success',
                                'comment',
                                'status',
                                'data_date_cancel'
                            )
                            ->where('service_id',$value)
                            ->first();

        return $query_service;
    }

    public function GetDataScoreService()
    {
        $query_sore = DBservice::
                            select(
                                'service_id',
                                'data_date',
                                'name',
                                'department',
                                'tel',
                                'building',
                                'floor',
                                'menuservice_id',
                                'description',
                                'picture',
                                'staff_id',
                                'data_date_start',
                                'data_date_success',
                                'comment',
                                'status',
                                'data_date_cancel'
                            )
                            ->where('userid',Session::get('userid'))
                            ->where('status',2)
                            ->first();

        return $query_sore;
    }

    public function ServiceLoad()
    {
    	$data_service		=	$this->GetUserDataService();
    	$data_menuservice	=	$this->GetDataMenuService();
        $chk_score          =   $this->GetDataScoreService();
        $data_staff         =   $this->GetDataStaff();
        // dd($chk_score);

    	$status = [
    		'0'	=>	'ยกเลิกการแจ้งซ่อม',
    		'1'	=>	'แจ้งซ่อม',
    		'2'	=>	'กำลังดำเนินการ',
    		'3'	=>	'เสร็จสิ้น'
    	];

    
        if($chk_score) {
            return view('service.score', [
                'data_staff'        =>  $data_staff,
                'data_service'      =>  $chk_score,
                'data_menuservice'  =>  $data_menuservice,
                'data_status'       =>  $status
            ]);
        } else {
            return view('service.form', [
                'data_service'      =>  $data_service,
                'data_menuservice'  =>  $data_menuservice,
                'data_status'       =>  $status
            ]);
        }

    	
    }

    public function ServiceAdminLoad()
    {
        $data_service       =   $this->GetAllDataService();
        $data_menuservice   =   $this->GetDataMenuService();
        $chk_score          =   $this->GetDataScoreService();
        $data_staff         =   $this->GetDataStaff();
        $status = [
            '0' =>  'ยกเลิกการแจ้งซ่อม',
            '1' =>  'แจ้งซ่อม',
            '2' =>  'กำลังดำเนินการ',
            '3' =>  'เสร็จสิ้น'
        ];

        return view('service.dashboard_service', [
            'data_staff'        =>  $data_staff,
            'data_score'        =>  $chk_score,
            'data_service'      =>  $data_service,
            'data_menuservice'  =>  $data_menuservice,
            'data_status'       =>  $status
        ]);
    }

    public function ViewService(Request $request)
    {
        $data_service       =   $this->GetDataViewService($request->service_id);
        $data_menuservice   =   $this->GetDataMenuService();
        $data_staff         =   $this->GetDataStaff();
        $active             =   $request->active;
        $status = [
            '0' =>  'ยกเลิกการแจ้งซ่อม',
            '1' =>  'แจ้งซ่อม',
            '2' =>  'กำลังดำเนินการ',
            '3' =>  'เสร็จสิ้น'
        ];

        return view('service.view', [
            'data_service'      =>  $data_service,
            'data_menuservice'  =>  $data_menuservice,
            'data_staff'        =>  $data_staff,
            'data_status'       =>  $status,
            'active'            =>  $active
        ]);
    }

    public function AdminViewService(Request $request)
    {
        $data_service       =   $this->GetDataViewService($request->value);
        $data_menuservice   =   $this->GetDataMenuService();
        $data_staff         =   $this->GetDataStaff();
        $status = [
            '0' =>  'ยกเลิกการแจ้งซ่อม',
            '1' =>  'แจ้งซ่อม',
            '2' =>  'กำลังดำเนินการ',
            '3' =>  'เสร็จสิ้น'
        ];

        return view('service.admin_view' ,[
            'data_service'      =>  $data_service,
            'data_menuservice'  =>  $data_menuservice,
            'data_staff'        =>  $data_staff,
            'data_status'       =>  $status 
        ]);
    }

    public function InsertService(Request $request)
    {
        $eng_day_arr=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        $eng_day = $eng_day_arr[date("w",time())];
        
        $time = date("H:i",time());
        $time_start = "08:30";
        $time_end = "16:30";
        
        if ($eng_day != "Saturday" && $eng_day != "Sunday") {
            if ($time >= $time_start && $time <= $time_end) {
                $data_menuservice   =   $this->GetDataMenuService();

            	if ($request->hasFile('picture')) {
            		$file_picture = $request->file('picture');

            		if (!$file_picture->isValid()){
                        return back()->with('error', $file->getErrorMessage());
                    }

                    $filename_picture = time(). '.' . $file_picture->getClientOriginalExtension();
                    $upload = $file_picture->storeAs('public/img/service', $filename_picture);
            	} else {
            		$filename_picture = NULL;
            	}

            	$data_service = new DBservice;

            	$data_service->service_id		=	$request->building.time().$request->floor;
            	$data_service->userid			=	Session::get('userid');
            	$data_service->data_date 		=	date('Y-m-d H:i:s');
            	$data_service->name 			=	$request->name;
            	$data_service->department 		= 	$request->department;
            	$data_service->tel 				=	$request->tel;
            	$data_service->building			=	$request->building;
            	$data_service->floor 			=	$request->floor;
            	$data_service->menuservice_id	=	$request->menuservice_id;
            	$data_service->description 		=	$request->description;
            	$data_service->picture 			=	$filename_picture;
            	$data_service->status 			=	$request->status;

            	try {
        	    	if ($data_service->save()) {
                        // $stickerPkg = 2; //stickerPackageId
                        // $stickerId = 34;
                        // $image_thumbnail_url = 'http://service.ddc.moph.go.th/storage/img/service/'.$filename_picture; 
                        // $image_fullsize_url = 'http://service.ddc.moph.go.th/storage/img/service/'.$filename_picture;

                        define("LINEAPI","https://notify-api.line.me/api/notify");
                        define("MESSAGE","\nงานแจ้งซ่อม\nหมายเลขงาน ::".time().$request->building.$request->floor."\nวัน-เวลา แจ้งซ่อม :: ".formatDateThai(date('Y-m-d H:i:s'))."\nขื่อ - นามสกุล ".$request->name."\nหน่วยงาน :: ".$request->department."\nอาคาร :: ".$request->building." ชั้น :: ".$request->floor."\nแจ้งปัญหา :: ".$data_menuservice[$request->menuservice_id]."\nรายละเอียด :: ".$request->description."\nเบอร์โทรศัพท์ :: ".$request->tel."\nกดรับงาน :: http://service.ddc.moph.go.th/service/admin/AdminViewService/".time().$request->building.$request->floor);
                        // define("MESSAGE","งานแจ้งซ่อม");
                        // define("TOKEN","7D3DGDfaZEfMiQPjoJGAEtmhY6UQjHyJa2XNyvUJBBK");
                        
                        define("TOKEN","DKzPT1p24lgNf56AWrFMKeoZSTHQm2OMkN53Hh5DW1Y");
                        //test
                        
                        $data = array(
                                    'message' => MESSAGE,
                                    // 'stickerPackageId'=>$stickerPkg,
                                    // 'stickerId'=>$stickerId,
                                    // 'imageThumbnail' => $image_thumbnail_url,
                                    // 'imageFullsize' => $image_fullsize_url,
                                );
                        $data = http_build_query($data,'','&');
                        $headerOptions = array(
                            'http'=>array(
                                'method'=>'POST',
                                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                ."Authorization: Bearer ".TOKEN."\r\n"
                                ."Content-Length: ".strlen($data)."\r\n",
                                'content' => $data
                            ),
                        );
                        $context = stream_context_create($headerOptions);
                        $result = file_get_contents(LINEAPI,FALSE,$context);
                        $res = json_decode($result);
                        
        	    		return redirect()->back()->with('alertSendFormSuccess', 'แจ้งซ่อมเรียบร้อย');
        	    	} else {
        	    		return redirect()->back();
        	    	}
        	    } catch(\Exception $e){
        	       echo $e->getMessage();
        	    }
            } else {
                return redirect()->back()->with('alert', 'วันทำการวันจันทร์ - ศุกร์ เวลา 8.30 - 16.30 น.');
            }
        } else {
            return redirect()->back()->with('alert', 'วันทำการวันจันทร์ - ศุกร์ เวลา 8.30 - 16.30 น.');
        }
    }

    public function DeleteService(Request $request)
    {
    	$data_delete = [
            'comment'           =>  $request->comment,
    		'status'            =>  $request->status,
            'data_date_cancel'  =>  date('Y-m-d H:i:s')
    	];

    	$delete_service = DBservice::where('service_id',$request->service_id)
    						->update($data_delete);
        return redirect()->route('ServiceForm');
    }

    public function ReciveService(Request $request)
    {
        $data_recive_service = [
            'staff_id'          =>  $request->staff_id,
            'status'            =>  $request->status,
            'data_date_start'   =>  date('Y-m-d H:i:s')
        ];

        $update_staffid_service = DBservice::where('service_id',$request->service_id)
                                    ->update($data_recive_service);

        return redirect()->back();
    }

    public function UpdateScore(Request $request)
    {
        $data_score = [
            'service_id'        =>  $request->service_id,
            'score'             =>  $request->score,
            'status'            =>  $request->status,
            'data_date_success' =>  date('Y-m-d H:i:s')
        ];

        $update_score = DBservice::where('service_id', $request->service_id)
                        ->update($data_score);

        return redirect()->route('ServiceForm');
    }
}