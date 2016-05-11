<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include './lib/std.php';
include './lib/helper.php';
include "./lib/dbConnector.php";
requireLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบบริการแท๊กซี่</title>
		<link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    </head>
    <body>
     <?php
        include "menu.php";
        if ($_GET["viewName"] != "") {
            include "./views/{$_GET["viewName"]}.php";
        } else {
            redirect("index.php?viewName=employeeList");
        }
        ?>
    </body>
</html>
