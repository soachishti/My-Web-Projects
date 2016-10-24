<?php
include ("config.php");
include ("misc.php");
include ("pagination.php");
include ("PrettyDateTime.php");

$sub_diretory = '/smschimp/';
$route = get_route();

// Login check
if ($route != "shareform" && $route != "login" && !isset($_SESSION['logged_user'])) {
    header("Location: login");
    die();
}
if ($route == "login" && isset($_SESSION['logged_user'])) {
    header("Location: index");
    die();
}

$file = "view/" . $route . ".php";
if (empty($route)) {
    header('Location: index') ; 
}
else if (file_exists("view/" . $route . ".php")) {
    include ($file);
}
else {
    include ("view/404.php");
}

include ("template/frontend.php");