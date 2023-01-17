<?php
use model\hrac\hrac;
require_once "../model/hrac.php";

if (isset($_POST["submit"])) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        header("Location: obnovaHesla?chyba=zly_email");
    } else {
        $email = $_POST["email"];
        $hrac = new hrac(null, null, $_POST["email"], null);
        if ($hrac->skontrolujCiNiejePrazdny()) {
            if ($email == $hrac->getEmail()) {
                $_SESSION['email'] = $email;
                header("Location: noveHeslo?chyba=ziadna");
            }
        } else {
            header("Location: obnovaHesla?chyba=email_neexistuje");
        }
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "email_neexistuje") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Uživateľ pod takýmto emailom nie je zaregistrovaný!</p> </div>";
    }
    if ($_GET["chyba"] == "zly_email") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Zlý Email</p> </div>";
    }
}
