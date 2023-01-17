<?php

use model\hrac\hrac;
require_once "../model/hrac.php";

if (!empty($_SESSION["id"])) {
    if (isset($_POST["submit"])) {
        if (isset($_POST["nickname"])) {
            if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["nickname"])) {
                header("Location: profil?chyba=nickname_obsahuje_len_pismenka_a_cisla");
            } else {
                $nickname = $_POST["nickname"];
                $hrac = new hrac($_SESSION["id"]);
                $duplicate = new hrac(null, $nickname, null, null);
                if ($duplicate->skontrolujCiNiejePrazdny()) {
                    header("Location: profil?chyba=uzivatel_nickname_uz_existuje");
                } else {
                    $hrac->nastavNoveMeno($nickname);
                    header("Location: profil?chyba=ziadna");
                }
            }
        }
        if (isset($_POST["email"])) {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                header("Location: profil?chyba=zly_email");
            } else {
                $email = $_POST["email"];
                $hrac = new hrac($_SESSION["id"]);
                $duplicate = new hrac(null, null, $email, null);
                if ($duplicate->skontrolujCiNiejePrazdny()) {
                    header("Location: profil?chyba=uzivatel_email_uz_existuje");
                } else {
                    $hrac->nastavNovyEmail($email);
                    header("Location: profil?chyba=ziadna");
                }
            }
        }
        if (isset($_POST["password"])) {
            if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])) {
                header("Location: profil?chyba=heslo_obsahuje_len_pismenka_a_cisla");
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["confirmpassword"])) {
                header("Location: profil?chyba=heslo_obsahuje_len_pismenka_a_cisla");
            } else {
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                $hrac = new hrac($_SESSION["id"]);
                if ($hrac->skontrolujCiNiejePrazdny()) {
                    if ($password == $confirmpassword) {
                        $hrac->nastavNoveHeslo($password);
                        header("Location: profil?chyba=ziadna");
                    } else {
                        header("Location: profil?chyba=heslo_sa_nezhoduje");
                    }
                }
            }
        }

    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "uzivatel_email_uz_existuje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Uživateľský email sa už používa</p> </div>";
    }
    if ($_GET["chyba"] == "uzivatel_nickname_uz_existuje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Uživateľský nickname sa už používa</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_sa_nezhoduje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Heslo sa nezhoduje</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v hesle nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "nickname_obsahuje_len_pismenka_a_cisla") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné znaky ako písmenka a čísla sa v nickname nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "zly_email") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Zlý Email</p> </div>";
    }
}
