<?php
ob_start();
session_start();
//$s = "mysql7.000webhost.com";
$s = "localhost";
$u = "root";//"a7539786_meditor";
$p = "root";//"RL6RnymaxOh3";
$d = "meditore";//"a7539786_meditor";

// Create connection
$mysqli = new mysqli($s, $u, $p, $d);

$username = "admin";
$password = "pass";
$perpage = 5;
$notification = 10;

$startdate =  '2016-01-01';

date_default_timezone_set("Asia/Karachi");