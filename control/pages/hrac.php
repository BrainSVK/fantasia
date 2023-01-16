<?php
require_once "../model/hrac.php";
use model\hrac\hrac;

if (!empty($_SESSION["id"])) {
    $hrac = new hrac($_SESSION["id"]);
} else {
    header("Location: ../view/login");
}
