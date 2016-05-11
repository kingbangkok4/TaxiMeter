<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

$order = new Product();
$id = $_REQUEST["id"];
$status = $_REQUEST["status"];


$order->update_status_product($id ,$status);
	redirect("index.php?viewName=productList");
?>
