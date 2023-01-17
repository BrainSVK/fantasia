<?php
require_once "../DBaccess/config.php";
require_once "../control/locate/zamkniBoj.php";
require_once "../control/pages/hrac.php";
require_once "../control/pages/postava.php";
require_once "../control/auth/profil/updateHrac.php";
require_once "../control/auth/profil/uploadImg.php";
/** @var \control\hrac $hrac */
/** @var \control\postava $postava */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="../skript/skript2.js"></script>
    <script type="text/javascript" src="../skript/skript.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav>
    <ul id='nav-bar'>
        <input type='checkbox' id='check' />
        <span class="menu">
                    <li><a href="ohre">O hre</a></li>
                    <li><a href="profil">Profil</a></li>
                    <li><a href="../control/auth/logout">Odhlasiť sa</a></li>
                    <li><a href="../control/auth/vymaz">Vymazať účet</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-bars"></i></label>
                </span>
        <label for="check" class="open-menu"><i class="fas fa-bars" style="color: white"></i></label>
    </ul>
</nav>
<header>
    <ul class="navigation">
        <li>
            <h1>Schopnosti</h1>
            <a href="schopnosti"><img src="../img/schopnosti.png" alt="schopnosti obrazok"></a>
        </li>
        <li>
            <h1>Postava</h1>
            <a href="postava"><img src="../img/postava.png" alt="postava obrazok"></a>
        </li>
        <li>
            <h1>Adventura</h1>
            <a href="adventura"><img src="../img/mapa.png" alt="adventura obrazok"></a>
        </li>
    </ul>
</header>
<div id="stredny">
    <div id="priehladny"></div>
    <div class="scrollmenu-hra">
        <div class="napisNaStred">
            <h>Profil</h>
        </div>
        <div class="stlpece">
            <div class="stlpec">
                <p>Informácie hráča:</p>
                <p1>Nickname: <?php echo $hrac->getNickname() ?> <br></p1>
                <form class="forma" method="post" autocomplete="off">
                    <div class="txt_field1">
                        <input type="text" id="nickname" name="nickname" required>
                        <label for="nickname">Nové meno</label>
                    </div>
                    <input class="submit1" type="submit" name="submit" value="Potvrdiť">
                </form>
                <p1>Email: <?php echo $hrac->getEmail() ?></p1>
                <form class="forma" method="post" autocomplete="off">
                    <div class="txt_field1">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Nový email</label>
                    </div>
                    <input class="submit1" type="submit" name="submit" value="Potvrdiť">
                </form>
                <p1>Heslo:</p1>
                <form class="forma" method="post" autocomplete="off">
                    <div class="txt_field1">
                        <input type="password" id="password" name="password" required>
                        <label for="password">Nové heslo</label>
                    </div>
                    <div class="txt_field1">
                        <input type="password" id="confirmpassword" name="confirmpassword" required>
                        <label for="confirmpassword" >Zopakuj Heslo</label>
                    </div>
                    <input class="submit1" type="submit" name="submit" value="Potvrdiť">
                </form>
            </div>
            <div class="stlpec">
                <div class="napisNaStredStlpca">
                    <h>Postava</h>
                </div>
                <div class="obrazokProfil" style="background-image: url(<?php echo $postava->getImg() ?>)"></div>
                <?php
                if ($postava->getImg() == "../img-hracov/fiary1.png") {
                ?>
                <form class="forma" method="post" enctype="multipart/form-data">
                    <input type="file" name="image" required>
                    <br>
                    <input class="submit2" type="submit" name="submit" value="Upload">
                </form>
                <?php
                } else {
                ?>
                <form class="forma" action="" method="post" autocomplete="off">
                    <input class="submit2" type="submit" name="submitVymaz" value="Vymaz">
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
if (isset($_GET["chyba"]) && $_GET["chyba"] == 1) {
    echo "<script type='text/javascript'>vypni();</script>";
    unset($_GET["chyba"]);
}
?>
</body>
</html>
