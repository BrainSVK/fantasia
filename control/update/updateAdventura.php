<?php
require_once '../../DBaccess/config.php';
require_once "../../model/postava.php";
require_once '../../model/boj.php';
use model\postava\postava;
use model\boj\boj;

if (!empty($_SESSION["id"])) {
    if (isset($_POST["koniec"])) {
        $boj = new boj($_SESSION["id"]);
        $boj->zvolBoj();
        $boj->vymazBoj();
        unset($_POST["koniec"]);
        unset($_SESSION["boj"]);
    }
    if (isset($_POST["boj"])) {
        $_SESSION["boj"] = $_SESSION["id"];
        $boj = new boj($_SESSION["id"],$_POST["obtiaznost"],$_POST["maxZ"],$_POST["aktZ"],$_POST["maxZNep"],$_POST["aktZNep"],$_POST["randSilaUtok"]);
        $boj->vytvorBoj();
        unset($_POST["boj"]);
    }
    if (isset($_POST["aktualizuj"])) {
        $boj = new boj($_SESSION["id"]);
        $boj->zvolBoj();
        $boj->aktualitujBoj($_POST["aktZ"],$_POST["aktZNep"]);
        unset($_POST["aktualizuj"]);
    }
} else {
    header("Location: ../login");
}
