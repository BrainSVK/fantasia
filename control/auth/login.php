<?php
use model\hrac\hrac;
require_once "../model/hrac.php";

if (!empty($_SESSION["id"])) {
    header("Location: postava");
}


if (isset($_POST["submit"])) {
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $hrac = new hrac(null,$_POST["nickname"],null,$_POST["password"]);
    if ($hrac->skontrolujCiNiejePrazdny()) {
        if ($hrac->spravneHeslo($password)) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $hrac->getId();
            header("Location: postava");
        }
        else {
            header("Location: login?chyba=nespravne_heslo");
        }
    } else {
        header("Location: login?chyba=uzivatel_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "nespravne_heslo") {
        echo "<div id='okienko'> <p>Nesprávne Heslo!</p> </div>";
    }
    if ($_GET["chyba"] == "uzivatel_neexistuje") {
        echo "<div id='okienko'> <p>Uživateľ neexistuje!</p> </div>";
    }
}