<?php
require "config.php";
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE nickname= '$nickname' OR email = '$nickname'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php?chyba=ziadna");
        }
        else {
            header("Location: login.php?chyba=nespravne_heslo");
        }
    } else {
        header("Location: login.php?chyba=uzivatel_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "nespravne_heslo") {
        echo "<div class='okienko'> <p>Nesprávne Heslo!</p> </div>";
    }
    if ($_GET["chyba"] == "uzivatel_neexistuje") {
        echo "<div class='okienko'> <p>Uživateľ neexistuje!</p> </div>";
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
    <div class="center l">
        <h1>Prihlásiť</h1>
        <form class="" action="" method="post" autocomplete="off">
            <div class="txt_field">
                <input type="text" name="nickname" required>
                <label for="nickname">Nickname</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <label for="password" >Heslo</label>
            </div>
            <div class="pass"> <a href="obnovaHesla.php">Zabudol si heslo?</a>
            </div>
            <input class="submit" type="submit" name="submit" value="Odoslat">
            <div class="singup_link">
                Nie si ešte registrovaný? <a href="registracia.php">Registrovať</a>
            </div>
        </form>

    </div>
</body>
</html>