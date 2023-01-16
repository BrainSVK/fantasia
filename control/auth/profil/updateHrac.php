<?php

use model\hrac\hrac;
require_once "../model/hrac.php";

if (!empty($_SESSION["id"])) {
    if (isset($_POST["submit"])) {
        if (isset($_POST["nickname"])) {
            $nickname = $_POST["nickname"];
            $hrac = new hrac($_SESSION["id"]);
            $duplicate = new hrac(null, $nickname,null,null);
            if ($duplicate->skontrolujCiNiejePrazdny()) {
                header("Location: profil?chyba=uzivatel_nickname_uz_existuje");
            } else {
                $hrac->nastavNoveMeno($nickname);
                header("Location: profil?chyba=ziadna");
            }
        }
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $hrac = new hrac($_SESSION["id"]);
            $duplicate = new hrac(null, null,$email,null);
            if ($duplicate->skontrolujCiNiejePrazdny()) {
                header("Location: profil?chyba=uzivatel_email_uz_existuje");
            } else {
                $hrac->nastavNovyEmail($email);
                header("Location: profil?chyba=ziadna");
            }
        }
        if (isset($_POST["password"])) {
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
        echo "<div id='okienko'> <p>Heslo sa nezhoduje</p> </div>";
    }
}
