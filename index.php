<?php
if (!empty($_SESSION["id"])) {
    header("Location: postava");
} else {
//    $host  = $_SERVER['HTTP_HOST'];
//    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
//    $extra = 'view/login';
//    header("Location: http://$host$uri/$extra");
    header("Location: view/login");
}
