<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/user.php";
include "./model/member.php";

// insert Member
$obj_user = new User();
$obj_member = new Member();

$data = array(
    "username" => $_REQUEST["username"],
    "password" => $_REQUEST["password"],
    "name" => $_REQUEST["name"],
    "phone" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"],
    "address" => $_REQUEST["address"],
    "gender" => $_REQUEST["gender"]
);

$obj_user->update($data, $_REQUEST["user_ref"]);
$obj_member->update($data, $_REQUEST["user_ref"]);

redirect("index.php?viewName=memberList");
?>

