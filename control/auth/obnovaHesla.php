<?php
use model\hrac\hrac;
require_once "../model/hrac.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $hrac = new hrac(null,null,$_POST["email"],null);
    if ($hrac->skontrolujCiNiejePrazdny()) {
        if ($email == $hrac->getEmail()) {
            $_SESSION['email'] = $email;
            header("Location: noveHeslo?chyba=ziadna");
        }
    } else {
        header("Location: obnovaHesla?chyba=email_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "email_neexistuje") {
        echo "<div id='okienko'> <p>Uživateľ pod takýmto emailom nie je zaregistrovaný!</p> </div>";
    }
}
