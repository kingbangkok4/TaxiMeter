<?php

include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

$pro = new Product();
$data = array(
	"product_id" => $_REQUEST["product_id"],
    "product_name" => $_REQUEST["product_name"],
    "product_unit" => $_REQUEST["product_unit"],
    "quantity" => $_REQUEST["quantity"],
	"low_quantity" => $_REQUEST["low_quantity"],
	"product_cost" => $_REQUEST["product_cost"],
    "product_price" => $_REQUEST["product_price"]
);
$pro->update($data, " id={$_REQUEST["id"]}");
var_dump($data);
//echo mysql_info();
redirect("index.php?viewName=productList");
