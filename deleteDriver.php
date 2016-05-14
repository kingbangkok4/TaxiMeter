<?php
    include "./lib/std.php";
    include "./lib/helper.php";
    include "./lib/dbConnector.php";
    include "./model/driver.php";

    $user = new Driver();
    $user->delete(" driverID = {$_REQUEST["driverID"]} ");

    redirect("index.php?viewName=driverList");
?>
