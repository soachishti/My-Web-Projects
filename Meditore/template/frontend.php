<?php
$body = ob_get_contents();
ob_end_clean();
include ("template/header.php");

if (!in_array($route, array("login", "logout")))
    include ("template/header_menu.php");

echo $body;
include ("template/footer.php");