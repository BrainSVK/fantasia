<?php
require_once '../model/fyzUtoky.php';
require_once '../model/magUtoky.php';
require_once '../model/vieUtoky.php';
use model\fyzUtoky\fyzUtoky;
use model\magUtoky\magUtoky;
use model\vieUtoky\vieUtoky;

//if (!empty($_SESSION["boj"])) {
//    header("Location: adventura.php");
//}

if (!empty($_SESSION["id"])) {
    $fyzUtoky = new fyzUtoky($_SESSION["id"]);
    $magUtoky = new magUtoky($_SESSION["id"]);
    $vieUtoky = new vieUtoky($_SESSION["id"]);
} else {
    header("Location: ../view/login");
}