<?php

function requireLogin() {
    if (empty($_SESSION["logedIn"])) {
        header("location: login.php");
    }
}

function redirect($url) {
    header("location:$url");
}
?>