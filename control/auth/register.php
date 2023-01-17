<?php

use model\hrac\hrac;
require_once "../model/hrac.php";

if (!empty($_SESSION["id"])) {
    header("Location: postava");
}
if (isset($_POST["submit"])) {
    if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["nickname"])) {
        header("Location: registracia?chyba=nickname_obsahuje_len_pismenka_a_cisla");
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        header("Location: registracia?chyba=zly_email");
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])) {
        header("Location: registracia?chyba=heslo_obsahuje_len_pismenka_a_cisla");
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["confirmpassword"])) {
        header("Location: noveHeslo?chyba=heslo_obsahuje_len_pismenka_a_cisla");
    } else {
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $noDuplicate = new hrac(null,$nickname,$email,$password);
        if ($noDuplicate->skontrolujCiNiejePrazdny()) {
            header("Location: registracia?chyba=uzivatel_nickname_alebo_email_uz_existuje");
        }
        else {
            if ($password == $confirmpassword) {
                $noDuplicate->vytvorNovehoHraca();
                $_SESSION["login"] = true;
                $_SESSION["id"] = $noDuplicate->getId();
                header("Location: postava?chyba=zidana");
            }
            else {
                header("Location: registracia?chyba=heslo_sa_nezhoduje");
            }
        }
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "uzivatel_nickname_alebo_email_uz_existuje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Uživateľský nickname alebo email sa už používa</p> </div>";
    }
    if ($_GET["chyba"] == "nickname_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v nickname nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "zly_email") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Zlý Email</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v hesle nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_sa_nezhoduje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Heslo sa nezhoduje</p> </div>";
    }
}