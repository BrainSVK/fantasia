<?php
require "config.php";
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($email == $row["email"]) {
            $_SESSION['email'] = $email;
            header("Location: noveHeslo.php?chyba=ziadna");
        }
    } else {
        header("Location: obnovaHesla.php?chyba=email_neexistuje");
    }
}

if (isset($_GET["chyba"])) {
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
<div class="center o">
  <h1>Obnoviť heslo</h1>
  <form class="" action="" method="post" autocomplete="off">
    <div class="txt_field">
      <input type="email" name="email" required>
      <label for="email">E-mail</label>
    </div>
    <input class="submit" type="submit" name="submit" value="Odoslat">
    <div class="singup_link">
      Späť na prihlásenie <a href="login.php">Prihlásiť</a>
    </div>
  </form>
</div>
</body>
</html>