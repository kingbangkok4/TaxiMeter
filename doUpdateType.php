<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";

$order = new Employee();
$id = $_REQUEST["id"];
$type = $_REQUEST["type"];


$order->update_type($id , $type);
redirect("index.php?viewName=employeeList");
?>
