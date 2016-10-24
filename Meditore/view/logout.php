<?php
$_SESSION['login'] = null;
session_destroy();
header("Location: login");