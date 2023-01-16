<?php
require_once '../../DBaccess/config.php';
require_once '../../model/postava.php';
use \model\postava\postava;
if (!empty($_SESSION["id"])) {
    $postava = new postava($_SESSION["id"]);
    $id = $_SESSION["id"];
    if (isset($_POST["fyzUtok"])) {
        $fyzUtok = $_POST["fyzUtok"];
        $postava->nastavFyzUtok($fyzUtok);
        unset($_POST["fyzUtok"]);
    }
    if (isset($_POST["magUtok"])) {
        $magUtok = $_POST["magUtok"];
        $postava->nastavMagUtok($magUtok);
        unset($_POST["magUtok"]);
    }
    if (isset($_POST["vieUtok"])) {
        $vieUtok = $_POST["vieUtok"];
        $postava->nastavVieUtok($vieUtok);
        unset($_POST["vieUtok"]);
    }
} else {
    header("Location: ../login");
}

