<?php
session_start();

$_SESSION = [];

session_unset();
session_destroy();
// date_default_timezone_set("ASIA/JAKARTA");

header('Location:../login.php');
