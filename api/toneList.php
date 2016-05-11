<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/tone.php";
$obj = new Tone();
$rows = $obj->read();
$resultArray = array();

	if ($rows != false) {
		foreach ($rows as $row) {
			$arrCol = array();
			$arrCol["name"] = $row["name"];
			$arrCol["code"] = $row["code"];
			array_push($resultArray,$arrCol);
		}
	}
	
echo json_encode($resultArray);
?>