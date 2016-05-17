<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/car.php";

// insert car
$obj = new Car();

$data = array(
    "brand" => $_REQUEST["brand"],
    "licensePlate" => $_REQUEST["licensePlate"],
    "status" => $_REQUEST["status"]
);
$obj->update($data, $_REQUEST["carID"]);
//echo $s;
redirect("index.php?viewName=carList");
?>
