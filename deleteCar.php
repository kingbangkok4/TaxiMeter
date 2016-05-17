<?php
    include "./lib/std.php";
    include "./lib/helper.php";
    include "./lib/dbConnector.php";
    include "./model/car.php";

    $obj = new Car();
    $obj->delete(" {$_REQUEST["carID"]} ");

    redirect("index.php?viewName=carList");
?>
