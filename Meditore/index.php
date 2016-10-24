<?php
include ("config.php");
include ("misc.php");

$sub_diretory = '/meditore/';
$route = get_route();

// Login check
if ($route != "login" && !isset($_SESSION['login'])) {
    header("Location: login");
    die();
}
if ($route == "login" && isset($_SESSION['login'])) {
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