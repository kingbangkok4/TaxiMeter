<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/type_car.php";
$obj = new NutCarCare();
$rows = $obj->read();
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["id"] = $row["id"];
			$arrCol["name"] = $row["name"];			
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>