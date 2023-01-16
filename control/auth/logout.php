<?php
require_once '../../DBaccess/config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../../view/login");
