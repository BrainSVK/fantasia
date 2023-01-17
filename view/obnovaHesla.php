<?php
require_once "../DBaccess/config.php";
require_once "../control/auth/obnovaHesla.php";
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
<div class="center o">
  <h1>Obnoviť heslo</h1>
  <form class="" method="post" autocomplete="off">
    <div class="txt_field">
      <input type="email" id="email" name="email" required>
      <label for="email">E-mail</label>
    </div>
    <input class="submit" type="submit" name="submit" value="Odoslat">
    <div class="singup_link">
      Späť na prihlásenie <a href="login">Prihlásiť</a>
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