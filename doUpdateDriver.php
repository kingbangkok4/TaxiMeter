<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/driver.php";

// insert employee
$obj = new Driver();

$data = array(
    "driverID" => $_REQUEST["driverID"],
    "name" => $_REQUEST["name"],
    "idCard" => $_REQUEST["idCard"],
    "gender" => $_REQUEST["gender"],
    "birthday" => $_REQUEST["birthday"],
    "address" => $_REQUEST["address"],
    "email" => $_REQUEST["email"],
    "phone" => $_REQUEST["mobile"]
);
$s = $obj->update($data);
//echo $s;
redirect("index.php?viewName=driverList");
?>
