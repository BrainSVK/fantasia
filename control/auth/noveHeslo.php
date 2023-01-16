<?php
use model\hrac\hrac;
require_once "../model/hrac.php";
if (!empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    header("Location: login");
}
if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $hrac = new hrac(null,null,$email,null);
    if ($hrac->skontrolujCiNiejePrazdny()) {
        if ($password == $confirmpassword) {
            $hrac->nastavNoveHeslo($password);
            session_unset();
            session_destroy();
            header("Location: login?chyba=ziadna");
        }
        else {
            header("Location: noveHeslo?chyba=heslo_sa_nezhoduje");
        }

    } else {
        header("Location: obnovaHesla?chyba=email_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "heslo_sa_nezhoduje") {
        echo "<div id='okienko'> <p>Heslo sa nezhoduje</p> </div>";
    }
    if ($_GET["chyba"] == "email_neexistuje") {
        echo "<div id='okienko'> <p>Uživateľ pod takýmto emailom nie je zaregistrovaný!</p> </div>";
    }
}
