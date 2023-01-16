<?php
require_once "../model/postava.php";
require_once "../model/boj.php";
use model\postava\postava;
use model\boj\boj;

if (!empty($_SESSION["id"])) {
    $postava = new postava($_SESSION["id"]);
    $boj = new boj($_SESSION["id"]);
    if ($boj->zvolBoj()) {
        $_SESSION["boj"] = $_SESSION["id"];
    }
} else {
    header("Location: ../view/login");
}