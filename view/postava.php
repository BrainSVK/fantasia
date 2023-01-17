<?php
require_once '../DBaccess/config.php';
require_once "../control/pages/postava.php";
require_once "../control/locate/zamkniBoj.php";
require_once "../control/pages/schopnosti.php";
//require_once "../control/pages/postava.php";
/** @var \control\schopnosti $fyzUtoky */
/** @var \control\schopnosti $magUtoky */
/** @var \control\schopnosti $vieUtoky */
/** @var \control\postava $postava */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="../skript/skript.js"></script>
    <script type="text/javascript" src="../skript/skript2.js"></script>
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
<!--        <div class="skryteOkno posSkry"></div>-->
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
        <div class="statyAktual">
            <div class="volne">
                <h1>Počet voľných statov je
                    <p id="volneSt"> <?php echo $postava->getVolneStaty(); ?> </p>
                </h1>
            </div>
            <h1>Aktuálne staty</h1>
            <div class="statyAktualRozOkno">
                <h1>Stav fyzickej sily je
                    <p id="fyz"> <?php echo $postava->getFyzickaSila() ?>  </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav magickej sily je
                    <p id="mag"> <?php echo $postava->getMagickaSila() ?> </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav viery je
                    <p id="vie"> <?php echo $postava->getViera() ?> </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav staminy je
                    <p id="stam"> <?php echo $postava->getStamina() ?> </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav vitality je
                    <p id="vit"> <?php echo $postava->getVitalita() ?> </p>
                </h1>
            </div>
            <div class="statyAktualRozOkno">
                <h1>Stav šťastia je
                    <p id="stas"> <?php echo $postava->getStastie() ?> </p>
                </h1>
            </div>
        </div>
        <div class="statyHlava">
            <h1>Vylepšiť staty</h1>
            <div class="staty">
                <div class="statOkno sila">
                    <div class="skryteOkno posSkry">
                        <p>Fyzická sila je atribút útočnej sily postavy spôsobená fyzickými útokmi</p>
                    </div>
                    <h1>Fyzická sila</h1>
                        <button onclick="zvysFyzUtok()" class="tlacitkoP tPriehladne">+</button>
                        <button onclick="znizFyzUtok()" class="tlacitkoL tPriehladne">-</button>
                </div>
                <div class="statOkno magia">
                    <div class="skryteOkno posSkry">
                        <p>Magická sila je atribút útočnej sily postavy spôsobená magickými útokmi</p>
                    </div>
                    <h1>Magická sila</h1>
                    <button onclick="zvysMagUtok()" class="tlacitkoP tPriehladne">+</button>
                    <button onclick="znizMagUtok()" class="tlacitkoL tPriehladne">-</button>
                </div>
                <div class="statOkno vie">
                    <div class="skryteOkno posSkry">
                        <p>Viera je atribút útočnej a liečivej sili postavy spôsobená modlitbami</p>
                    </div>
                    <h1>Viera</h1>
                    <button onclick="zvysVieru()" class="tlacitkoP tPriehladne">+</button>
                    <button onclick="znizVieru()" class="tlacitkoL tPriehladne">-</button>
                </div>
                <div class="statOkno stam">
                    <div class="skryteOkno posSkry">
                        <p>Stamína je atribút postavy výdrže a odolnosti voči magickým útokom</p>
                    </div>
                    <h1>Stamina</h1>
                    <button onclick="zvysStaminu()" class="tlacitkoP tPriehladne">+</button>
                    <button onclick="znizStaminu()" class="tlacitkoL tPriehladne">-</button>
                </div>
                <div class="statOkno vit">
                    <div class="skryteOkno posSkry">
                        <p>Vitalita je atribút postavy života a odolnosti voči fyzickým útokom</p>
                    </div>
                    <h1>Vitalita</h1>
                    <button onclick="zvysVitalitu()" class="tlacitkoP tPriehladne">+</button>
                    <button onclick="znizVitalitu()" class="tlacitkoL tPriehladne">-</button>
                </div>
                <div class="statOkno sta">
                    <div class="skryteOkno posSkry">
                        <p>Štastie je atribút postavy percentuálnej šance kritického úderu</p>
                    </div>
                    <h1>Šťastie</h1>
                    <button onclick="zvysStastie()" class="tlacitkoP tPriehladne">+</button>
                    <button onclick="znizStastie()" class="tlacitkoL tPriehladne">-</button>
                </div>
            </div>
        </div>
    </div>
<!--    <form class="" action="" method="post">-->
<!--        <div class="odhlasit"><a href="../control/auth/logout.php">Odhlásiť</a></div>-->
<!--    </form>-->
<!--    <form class="" action="" method="post">-->
<!--        <div class="vymazaťProfil"><a href="../control/auth/vymaz.php">Vymazať uživateľa</a></div>-->
<!--    </form>-->
</body>
</html>