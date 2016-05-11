<?php
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

$pro = new Product();
$pro->delete_in(" id = {$_REQUEST["id"]}");
redirect("index.php?viewName=productInList");
