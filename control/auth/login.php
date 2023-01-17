<?php
use model\hrac\hrac;
require_once "../model/hrac.php";

if (!empty($_SESSION["id"])) {
    header("Location: postava");
}


if (isset($_POST["submit"])) {
    if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])) {
        header("Location: login?chyba=heslo_obsahuje_len_pismenka_a_cisla");
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["nickname"])) {
        header("Location: login?chyba=nickname_obsahuje_len_pismenka_a_cisla");
    } else {
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
        $hrac = new hrac(null, $_POST["nickname"], null, $_POST["password"]);
        if ($hrac->skontrolujCiNiejePrazdny()) {
            if ($hrac->spravneHeslo($password)) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $hrac->getId();
                header("Location: postava");
            } else {
                header("Location: login?chyba=nespravne_heslo");
            }
        } else {
            header("Location: login?chyba=uzivatel_neexistuje");
        }
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "nespravne_heslo") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Nesprávne Heslo!</p> </div>";
    }
    if ($_GET["chyba"] == "uzivatel_neexistuje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Uživateľ neexistuje!</p> </div>";
    }
    if ($_GET["chyba"] == "nickname_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v nickname nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v hesle nepoužívaju!</p> </div>";
    }
}