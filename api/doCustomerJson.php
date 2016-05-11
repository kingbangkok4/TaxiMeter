<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/customer.php";
$name = $_REQUEST["name"];
$mobile = $_REQUEST["mobile"];
$email = $_REQUEST["email"];
$license_plate = $_REQUEST["license_plate"];
$brand = $_REQUEST["brand"];
$type = $_REQUEST["type"];
$color = $_REQUEST["color"];
$scar = $_REQUEST["scar"];
$filename_front = $_REQUEST["filename_front"];
$filename_top = $_REQUEST["filename_top"];
$filename_left = $_REQUEST["filename_left"];
$filename_right = $_REQUEST["filename_right"];
$filename_behide = $_REQUEST["filename_behide"];

$obj = new NutCarCare();
$rows = $obj->insert($name, $mobile, $email, $license_plate, $brand, $type, $color, $scar, $filename_front , $filename_top, $filename_left, $filename_right, $filename_behide);
$resultArray = array();
	if ($rows != false) {
		$arrCol = array();
			$arrCol["error"] = "บันทึกสำเร็จ";			
			array_push($resultArray,$arrCol);
	}else{
			$arrCol = array();
			$arrCol["error"] = "เกิดข้อผิดพลาด !";			
			array_push($resultArray,$arrCol);
	}
	
echo json_encode($resultArray);
?>