<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/employee.php";
// insert employee
$emp = new Employee();
$data = array(
	"username" => $_REQUEST["username"],
	"password" => $_REQUEST["password"],
    "fullname" => $_REQUEST["fullname"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"],
    "address" => $_REQUEST["address"],
	"province" => $_REQUEST["province"],
    "title" => $_REQUEST["title"]
);
$emp->update($data, " {$_REQUEST["user_ref"]} ");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=employeeList");
