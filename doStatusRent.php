<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/rent.php";

$obj = new Rent();
$rentID = $_REQUEST["rentID"];

$obj->update_status($rentID);
redirect("index.php?viewName=rentList");
?>
