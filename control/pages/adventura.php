<?php
require_once '../model/boj.php';
require_once '../model/postava.php';
use model\postava\postava;
use model\boj\boj;

if (!empty($_SESSION["id"])) {
    if (!empty($_SESSION["boj"])) {
        $postava = new postava($_SESSION["id"]);
        $boj = new boj($_SESSION["id"]);
        $boj->zvolBoj();
        $obtiaznost = $boj->getObtiaznost();
        $fyzSila = $postava->getFyzickaSila();
        $magSila = $postava->getMagickaSila();
        $viera = $postava->getViera();
        $stamina = $postava->getStamina();
        $vitalita = $postava->getVitalita();
        $stastie = $postava->getStastie();
        $volne_staty = $postava->getVolneStaty();
        $maxZ = $boj->getMaxZ();
        $aktZ = $boj->getAktZ();
        $maxZNep = $boj->getMaxZNep();
        $aktZNep = $boj->getAktZNep();
        $randSilaUtok = $boj->getRandSilaUtok();
    } else {
        $boj = null;
    }
} else {
    header("Location: ../view/login");
}

