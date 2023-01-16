<?php
require_once '../../DBaccess/config.php';
require_once '../../model/postava.php';
use model\postava\postava;
if (!empty($_SESSION["id"])) {
    if (isset($_POST["volneStaty"])) {
        $volne_Staty = $_POST["volneStaty"];
        unset($_POST["volneStaty"]);
        $postava = new postava($_SESSION["id"]);
        $postava->setVolnestaty($postava->getVolneStaty()+$volne_Staty);
    }
    if (isset($_POST["prehra"])) {
        $prehra = $_POST["prehra"];
        unset($_POST["prehra"]);
        $postava = new postava($_SESSION["id"]);
        $postava->setVolnestaty(0);
        $postava->setFyzickaSila($prehra);
        $postava->setMagickaSila($prehra);
        $postava->setViera($prehra);
        $postava->setStamina($prehra);
        $postava->setVitalita($prehra);
        $postava->setStastie($prehra);
    }
} else {
    header("Location: ../login");
}

