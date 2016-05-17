<?php
    include "./lib/std.php";
    include "./lib/helper.php";
    include "./lib/dbConnector.php";
    include "./model/member.php";

    $obj = new Service();
    $obj->delete(" {$_REQUEST["user_ref"]} ");

    redirect("index.php?viewName=memberList");
?>
