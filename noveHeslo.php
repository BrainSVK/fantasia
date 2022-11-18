<?php
require 'config.php';
if (!empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    header("Location: login.php");
}
if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $confirmpassword) {
            $query = "UPDATE gm_player SET password = '$password' WHERE email = '$email'";
            mysqli_query($conn,$query);
            session_unset();
            session_destroy();
            header("Location: index.php?chyba=ziadna");
        }
        else {
            header("Location: noveHeslo.php?chyba=heslo_sa_nezhoduje");
        }

    } else {
        header("Location: obnovaHesla.php?chyba=email_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "heslo_sa_nezhoduje") {
        echo "<div class='okienko'> <p>Heslo sa nezhoduje</p> </div>";
    }
    if ($_GET["chyba"] == "email_neexistuje") {
        echo "<div class='okienko'> <p>Uživateľ pod takýmto emailom nie je zaregistrovaný!</p> </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="center n">
    <h1>Obnoviť heslo</h1>
    <form class="" action="" method="post" autocomplete="off">
        <div class="txt_field">
            <input type="password" name="password" required>
            <label for="password">Nové heslo</label>
        </div>
        <div class="txt_field">
            <input type="password" name="confirmpassword" required>
            <label for="confirmpassword" >Zopakuj Heslo</label>
        </div>
        <input class="submit" type="submit" name="submit" value="Odoslat">
    </form>

</div>
</body>
</html>
