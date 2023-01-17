<?php
require_once "../DBaccess/config.php";
require_once "../control/auth/login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
    <script type="text/javascript" src="../skript/skript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="center l">
        <h1>Prihlásiť</h1>
        <form class="" method="post" autocomplete="off">
            <div class="txt_field">
                <input type="text" id="nickname" name="nickname" required>
                <label for="nickname">Nickname</label>
            </div>
            <div class="txt_field">
                <input type="password" id="password" name="password" required>
                <label for="password" >Heslo</label>
            </div>
            <div class="pass"> <a href="obnovaHesla">Zabudol si heslo?</a>
            </div>
            <input class="submit" type="submit" name="submit" value="Odoslat">
            <div class="singup_link">
                Nie si ešte registrovaný? <a href="registracia">Registrovať</a>
            </div>
        </form>

    </div>
<?php
if (isset($_GET["chyba"]) && $_GET["chyba"] == 1) {
    echo "<script type='text/javascript'>vypni();</script>";
    unset($_GET["chyba"]);
}
?>
</body>
</html>