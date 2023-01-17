<?php
require_once "../DBaccess/config.php";
require_once "../control/auth/register.php";
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
<div class="center r">
  <h1>Registrovať</h1>
  <form class="" method="post" autocomplete="off">
    <div class="txt_field">
      <input type="text" name="nickname" id="nickname" required>
      <label for="nickname">Nickname</label>
    </div>
    <div class="txt_field">
      <input type="email" name="email" id="email" required>
      <label for="email">E-mail</label>
    </div>
    <div class="txt_field">
      <input type="password" name="password" id="password" required>
      <label for="password">Heslo</label>
    </div>
    <div class="txt_field">
      <input type="password" name="confirmpassword" id="confirmpassword" required>
      <label for="confirmpassword">Zopakuj Heslo</label>
    </div>
    <input class="submit" type="submit" name="submit" value="Odoslat">
    <div class="singup_link">
      Už si registrovaný? <a href="login">Prihlásiť</a>
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