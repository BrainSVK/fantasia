<?php
require_once '../DBaccess/config.php';
require_once "../control/pages/schopnosti.php";
require_once "../control/pages/postava.php";
require_once "../control/pages/adventura.php";
/** @var \control\schopnosti $fyzUtoky */
/** @var \control\schopnosti $magUtoky */
/** @var \control\schopnosti $vieUtoky */
/** @var \control\postava $postava */
/** @var \control\adventura $boj */
/** @var \control\adventura $obtiaznost */
/** @var \control\adventura $fyzSila */
/** @var \control\adventura $magSila */
/** @var \control\adventura $viera */
/** @var \control\adventura $stamina */
/** @var \control\adventura $vitalita */
/** @var \control\adventura $stastie */
/** @var \control\adventura $volne_staty */
/** @var \control\adventura $maxZ */
/** @var \control\adventura $aktZ */
/** @var \control\adventura $maxZNep */
/** @var \control\adventura $aktZNep */
/** @var \control\adventura $randSilaUtok */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="../skript/skript2.js"></script>
    <script type="text/javascript" src="../skript/skript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav>
    <ul id='nav-bar'>
        <!--                <li class='logo'><a href='#'><img src='./images/logo.png'/></a></li>-->
        <input type='checkbox' id='check' />
        <span class="menu">
                <li><a href="ohre">O hre</a></li>
                <li><a href="profil">Profil</a></li>
                <li><a href="../control/auth/logout">Odhlasiť sa</a></li>
                <li><a href="../control/auth/vymaz">Vymazať účet</a></li>
                <label for="check" class="close-menu"><i class="fas fa-bars" ></i></label>
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
<div class="stredny"></div>
    <div id="oknoBoj">
        <div id="obrazok" style="background-image: url(<?php echo $postava->getImg() ?>)"></div>
        <progress id="health"></progress>
        <p id="p1">100/100</p>
        <div id="obrazokNepriatel"></div>
        <progress id="healthNepriatel"></progress>
        <p id="p2">100/100</p>
            <div id="pata">
                <div id="pouzivaneSchopnosti">
                    <img onclick="<?php echo $fyzUtoky->getNazovFunkcie(); ?>" id="fyzImg" src="<?php echo $fyzUtoky->getFyzImgUrl() ?>" alt="<?php echo $fyzUtoky->getNazovFyzUtoku() ?>">
                    <img onclick="<?php echo $magUtoky->getNazovFunkcie(); ?>" id="magImg" src="<?php echo $magUtoky->getMagImgUrl() ?>" alt="<?php echo $magUtoky->getNazovMagUtoku() ?>">
                    <img onclick="<?php echo $vieUtoky->getNazovFunkcie(); ?>" id="vieImg" src="<?php echo $vieUtoky->getVieImgUrl() ?>" alt="<?php echo $vieUtoky->getNazovVieUtoku() ?>">
                </div>
                <div id="popis">
                    <p id="popis1"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="stredny">
    <div id="priehladny"></div>
    <div class="obrazok" style="background-image: url(<?php echo $postava->getImg() ?>)"></div>
    <div class="statySchopnosti">
        <h1>SCHOPNOSTI</h1>
        <div class="pouzivaneSchopnosti">
            <img id="fyzImg" src="<?php echo $fyzUtoky->getFyzImgUrl() ?>" alt="<?php echo $fyzUtoky->getNazovFyzUtoku() ?>" style="min-width: 60px">
            <img id="magImg" src="<?php echo $magUtoky->getMagImgUrl() ?>" alt="<?php echo $magUtoky->getNazovMagUtoku() ?>" style="min-width: 60px">
            <img id="vieImg" src="<?php echo $vieUtoky->getVieImgUrl() ?>" alt="<?php echo $vieUtoky->getNazovVieUtoku() ?>" style="min-width: 60px">
        </div>
    </div>
    <div class="statySchopnosti">
        <h1>SCHOPNOSTI</h1>
        <div class="pouzivaneSchopnosti"></div>
    </div>
  <div class="statyAdventura">
    <h1>ADVENTURA</h1>
    <div class="scrollmenu scrollmenu2">
        <img src="../img/adventura800.png" alt="schopnost heal" usemap="#workmap">
        <map name="workmap">
            <area shape="rect" coords="208,54,241,83" onclick="spusti(1, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="103,119,134,151" onclick="spusti(2, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="263,135,297,164" onclick="spusti(3, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="189,230,222,260" onclick="spusti(4, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="118,300,150,330" onclick="spusti(5, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="287,358,318,387" onclick="spusti(6, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="87,403,120,433" onclick="spusti(7, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="161,477,193,507" onclick="spusti(8, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="412,88,444,117" onclick="spusti(9, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="514,216,546,246" onclick="spusti(10, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="608,51,641,82" onclick="spusti(11, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="612,219,645,247" onclick="spusti(12, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="621,315,651,344" onclick="spusti(13, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="419,357,450,482" onclick="spusti(14, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="513,462,539,490" onclick="spusti(15, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
            <area shape="rect" coords="665,376,696,406" onclick="spusti(16, <?php echo $postava->getFyzickaSila() ?> , <?php echo $postava->getMagickaSila() ?> , <?php echo $postava->getViera() ?> , <?php echo $postava->getStamina() ?>, <?php echo $postava->getVitalita() ?> , <?php echo $postava->getStastie() ?> , <?php echo $postava->getVolneStaty() ?> )">
        </map>
    </div>
  </div>
</div>
<!--<form class="" action="" method="post">-->
<!--    <div class="odhlasit"><a href="../control/auth/logout.php">Odhlásiť</a></div>-->
<!--</form>-->
<!--<form class="" action="" method="post">-->
<!--    <div class="vymazaťProfil"><a href="../control/auth/vymaz.php">Vymazať uživateľa</a></div>-->
</form>
<?php
if ($boj != null) {
    echo "<script type='text/javascript'>obnovSuboj('$obtiaznost', '$fyzSila', '$magSila','$viera','$stamina','$vitalita','$stastie','$volne_staty','$maxZ','$aktZ','$maxZNep','$aktZNep','$randSilaUtok');</script>";
}
?>
</body>
</html>