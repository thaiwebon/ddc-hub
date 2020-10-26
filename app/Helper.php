<?php

function formatDateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array(
    					"",
    					"มกราคม",
    					"กุมภาพันธ์",
    					"มีนาคม",
    					"เมษายน",
    					"พฤษภาคม",
    					"มิถุนายน",
    					"กรกฎาคม",
    					"สิงหาคม",
    					"กันยายน",
    					"ตุลาคม",
    					"พฤศจิกายน",
    					"ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    return "วันที่ :: $strDay $strMonthThai $strYear เวลา :: $strHour:$strMinute น.";
}

// function formatDayThai($strDay)
// {
// 	$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
// 	$strDayThai = $thai_day_arr[date("w",time())];
// 	return "$strDayThai";
// }

// function formatDayEng($strDay)
// {
// 	$strDay = date("w",time($strDate));
// 	$eng_day_arr=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
// 	$strDayEng = $eng_day_arr[$strDay];
// 	return "$strDayEng";
// }
