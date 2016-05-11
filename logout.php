<?php

include "./lib/std.php";
include "./lib/helper.php";
session_destroy();
redirect("login.php");
?>