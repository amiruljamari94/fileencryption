<?php

if(!session_id()) session_start();

# 2. Declare Malaysia time zone => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');


require_once '../app/init.php';
define('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/');

$app = new App;