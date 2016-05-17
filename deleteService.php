<?php
    include "./lib/std.php";
    include "./lib/helper.php";
    include "./lib/dbConnector.php";
    include "./model/service.php";

    $obj = new Service();
    $obj->delete(" {$_REQUEST["serviceID"]} ");

    redirect("index.php?viewName=serviceList");
?>
