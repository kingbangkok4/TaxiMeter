<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/employee.php";
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$obj = new Employee();
$rows = $obj->get_user(" username='{$username}' AND password='{$password}' ");
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["username"] = $row["username"];
			//$arrCol["price"] = number_format($row["price"], 2);
			$arrCol["password"] = $row["password"];
			$arrCol["type"] = $row["type"];
		    $arrCol["error"] = "0";			
			array_push($resultArray,$arrCol);
		}
	}else{
			$arrCol = array();
			$arrCol["error"] = "1";			
			array_push($resultArray,$arrCol);
	}
	
echo json_encode($resultArray);
?>