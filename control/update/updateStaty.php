<?php
require_once '../../DBaccess/config.php';
require_once '../../model/postava.php';
use \model\postava\postava;
if (!empty($_SESSION["id"])) {
    $postava = new postava($_SESSION["id"]);
    $id = $_SESSION["id"];
    if (!empty($_POST["volneStaty"]) && !empty($_POST["fyzickaSilaPlus"])) {
        $postava->setFyzickaSila($postava->getFyzickaSila()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["fyzickaSilaMinus"])) {
        $postava->setFyzickaSila($postava->getFyzickaSila()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["magickaSilaPlus"])) {
        $postava->setMagickaSila($postava->getMagickaSila()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["magickaSilaMinus"])) {
        $postava->setMagickaSila($postava->getMagickaSila()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["vieraPlus"])) {
        $postava->setViera($postava->getViera()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["vieraMinus"])) {
        $postava->setViera($postava->getViera()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["staminaPlus"])) {
        $postava->setStamina($postava->getStamina()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["staminaMinus"])) {
        $postava->setStamina($postava->getStamina()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["vitalitaPlus"])) {
        $postava->setVitalita($postava->getVitalita()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["vitalitaMinus"])) {
        $postava->setVitalita($postava->getVitalita()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["stastiePlus"])) {
        $postava->setStastie($postava->getStastie()+1);
        $postava->setVolneStaty($postava->getVolneStaty()-1);
    }
    if (!empty($_POST["volneStaty"]) && !empty($_POST["stastieMinus"])) {
        $postava->setStastie($postava->getStastie()-1);
        $postava->setVolneStaty($postava->getVolneStaty()+1);
    }
} else {
    header("Location: ../login");
}