<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

// insert employee
$pro = new Product();                       
    $data = array(
    "product_id" => $_REQUEST["product_id"],
    "product_name" => $_REQUEST["product_name"],
    "product_unit" => $_REQUEST["product_unit"],
    "quantity" => $_REQUEST["quantity"],
	"product_cost" => $_REQUEST["product_cost"],
    "product_price" => $_REQUEST["product_price"]
    );
    $pro->insert($data);
    redirect("index.php?viewName=productList");
?>
