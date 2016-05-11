<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/customer.php";
$name = $_REQUEST["name"];
$obj = new NutCarCare();
$rows = $obj->read(" name LIKE '%{$name}%' ");
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["name"] = $row["name"];
			$arrCol["mobile"] = $row["mobile"];	
			$arrCol["email"] = $row["email"];	
			$arrCol["license_plate"] = $row["license_plate"];	
			$arrCol["brand"] = $row["brand"];	
			$arrCol["type"] = $row["type"];	
			$arrCol["color"] = $row["color"];	
			$arrCol["scar"] = $row["scar"];	
			$arrCol["front_image"] = $row["front_image"];	
			$arrCol["left_image"] = $row["left_image"];	
			$arrCol["right_image"] = $row["right_image"];	
			$arrCol["behide_image"] = $row["behide_image"];	
			$arrCol["top_image"] = $row["top_image"];			
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>