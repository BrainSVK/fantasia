<?php
require "config.php";
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["nickname"])) {
        header("Location: registracia.php?chyba=nickname_obsahuje_len_pismenka_a_cisla");
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        header("Location: registracia.php?chyba=zly_email");
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])) {
        header("Location: registracia.php?chyba=heslo_obsahuje_len_pismenka_a_cisla");
    } else {
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        /** @var TYPE_NAME $conn */
        $duplicate = mysqli_query($conn,"SELECT * FROM gm_player WHERE nickname = '$nickname' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            header("Location: registracia.php?chyba=uzivatel_nickname_alebo_email_uz_existuje");
        }
        else {
            if ($password == $confirmpassword) {
                $query1 = "INSERT INTO gm_postava VALUES ('',10,10,10,10,10,10,0,1,1,1)";
                mysqli_query($conn,$query1);
//            INSERT INTO gm_player(id,nickname,email,password,id_postavy) VALUES ('', "miro", "miro@gmail.com", 1234,(SELECT max(id) FROM gm_postava));
                $query = "INSERT INTO gm_player(id,nickname,email,password,id_postavy) VALUES('', '$nickname','$email','$password',(SELECT max(id) FROM gm_postava))";
                mysqli_query($conn,$query);
                $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE nickname= '$nickname'");
                $row = mysqli_fetch_assoc($result);
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: index.php?chyba=zidana");
            }
            else {
                header("Location: registracia.php?chyba=heslo_sa_nezhoduje");
            }
        }
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "uzivatel_nickname_alebo_email_uz_existuje") {
        echo "<div class='okienko'> <p>Uživateľský nickname alebo email sa už používa</p> </div>";
    }
    if ($_GET["chyba"] == "nickname_obsahuje_len_pismenka_a_cisla") {
        echo "<div class='okienko'> <p>Iné znaky ako písmenka a čísla sa v nickname nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "zly_email") {
        echo "<div class='okienko'> <p>Zlý Email</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_obsahuje_len_pismenka_a_cisla") {
        echo "<div class='okienko'> <p>Iné znaky ako písmenka a čísla sa v hesle nepoužívaju!</p> </div>";
    }
    if ($_GET["chyba"] == "heslo_sa_nezhoduje") {
        echo "<div class='okienko'> <p>Heslo sa nezhoduje</p> </div>";
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
<div class="center r">
  <h1>Registrovať</h1>
  <form class="" method="post" action="" autocomplete="off">
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
      Už si registrovaný? <a href="login.php">Prihlásiť</a>
    </div>
  </form>

</div>
</body>
</html>