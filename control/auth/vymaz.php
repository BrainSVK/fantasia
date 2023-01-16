<?php
require_once '../../DBaccess/config.php';
require_once "../../model/postava.php";
require_once "../../model/boj.php";
use model\postava\postava;
use model\boj\boj;

if (!empty($_SESSION["id"])) {
    $postava = new postava($_SESSION["id"]);
    $boj = new boj($_SESSION["id"]);
    $postava->vymazPostavu();
    if ($boj->zvolBoj()) {
        $boj->vymazBoj();
    }
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: ../../view/login");
}
