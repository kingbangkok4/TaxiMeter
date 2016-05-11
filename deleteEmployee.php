<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";
include "./model/user.php";

$user = new User();
$user->delete(" id = {$_REQUEST["user_ref"]} ");

$emp = new Employee();
$emp->delete(" user_ref = {$_REQUEST["user_ref"]} ");

redirect("index.php?viewName=employeeList");
?>
