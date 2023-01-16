<?php
require_once "../DBaccess/config.php";
require_once "../control/auth/noveHeslo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../style/style.css">
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
