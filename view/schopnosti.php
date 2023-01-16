<?php
require_once '../DBaccess/config.php';
require_once "../control/locate/zamkniBoj.php";
require_once "../control/pages/schopnosti.php";
require_once "../control/pages/postava.php";
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
            <!--                <li class='logo'><a href='#'><img src='./images/logo.png'/></a></li>-->
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
        <div class="obrazok" style="background-image: url(<?php echo $postava->getImg() ?>)"></div>
        <div class="statySchopnosti">
            <h1>SCHOPNOSTI</h1>
            <div class="pouzivaneSchopnosti">
                <img id="fyzImg" src="<?php echo $fyzUtoky->getFyzImgUrl() ?>" alt="<?php echo $fyzUtoky->getNazovFyzUtoku() ?>" style="min-width: 60px">
                <img id="magImg" src="<?php echo $magUtoky->getMagImgUrl() ?>" alt="<?php echo $magUtoky->getNazovMagUtoku() ?>" style="min-width: 60px">
                <img id="vieImg" src="<?php echo $vieUtoky->getVieImgUrl() ?>" alt="<?php echo $vieUtoky->getNazovVieUtoku() ?>" style="min-width: 60px">
            </div>
        </div>
        <div class="rozdelSchopnosti">
            <div class="schopnostiUtokov">
                <h1>Fyziské schopnosti</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="flying">
                                <button onclick="dajFlyingkick()" style="padding: 0; background: none ;border: none;"><img src="../img/FlyingKick60.png" alt="flyingkick"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FlyingKick je fyzická schopnosť na vytvorenie
                                        <p2>kombinácie útokov(50%)
                                            <div class="kick">
                                                <div class="skryteOkno2">
                                                    <p3>Kombinácia útokov ti dovolí použiť ďalšiu schopnosť</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="bod">
                                <button onclick="dajBodySlam()" style="padding: 0; background: none ;border: none;"><img src="../img/BodySlam60.png" alt="bodyslam"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>BodySlam je fyziská schopnosť pri ktorej hodom o zem
                                        <p2>omráčiš protivníka(20%)
                                            <div class="slam">
                                                <div class="skryteOkno2">
                                                    <p3>Omráčenie nedovolí uživateľovi použiť schopnosť</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="gataling">
                                <button onclick="dajPunchingGataling()" style="padding: 0; background: none ;border: none;"><img src="../img/PunchGataling60.png" alt="punchgataling"/></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>PunchGataling je fyzická schopnosť pri ktorej uzivatel
                                        <p2>vrhá päsťami(80%)
                                            <div class="punch">
                                                 <div class="skryteOkno2">
                                                    <p3>Vrhanať päsťami uživateľ bude dokým bude triafať</p3>
                                                </div>
                                            </div>
                                         </p2>
                                     </p1>
                                </div>
                        </div>
                    </li>
                </div>
                <h1>Magické schopnosti</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="fire">
                                <button onclick="dajFireBall()" style="padding: 0; background: none ;border: none;"><img src="../img/fireBall60.png" alt="fireball" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FireBall je magická schopnosť ohnivého atribútu
                                        <p2>spôsobuje zapálenie(60%)
                                            <div class="fir">
                                                <div class="skryteOkno2">
                                                    <p3>Zapálenie poškodzuje uživateľa dokým horí <br> (10% maxHp protivníka)</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="frost">
                                <button onclick="dajFrostNova()" style="padding: 0; background: none ;border: none;"><img src="../img/frostNova60.png" alt="frostnova" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>FrostNova je magická schopnosť ľadového atribútu
                                        <p2>spôsobuje umrznutie(80%)
                                            <div class="frot">
                                                <div class="skryteOkno2">
                                                <p3>Umrznutie poškodzuje uživateľa dokým mrzne <br> (5% maxHp protivníka)</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="wind">
                                <button onclick="dajWindSlash()" style="padding: 0; background: none ;border: none;"><img src="../img/windSlash60.png" alt="windslash" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>WindSlash je magická schopnosť veterného atribútu
                                        <p2>spôsobuje krvácanie(30%)
                                            <div class="win">
                                                <div class="skryteOkno2">
                                                    <p3>Krvácanie poškodzuje uživateľa dokým krváca <br> (20% maxHp protivníka)</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                </div>
                <h1>Schopnosti viery</h1>
                <div class="schopnostiUtokovRozOkno">
                    <li>
                        <div class="wind">
                                <button onclick="dajHeal()" style="padding: 0; background: none ;border: none;"><img src="../img/heal60.png" alt="heal" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>Heal je schopnosť viery pri ktorej sa uživateľ <br>
                                        <p2>vylieči životy
                                            <div class="win">
                                                <div class="skryteOkno2">
                                                    <p3>Umožní si obnoviť body života (250% viery)</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="bod">
                                <button onclick="dajDefBonus()" style="padding: 0; background: none ;border: none;"><img src="../img/defBonus60.png" alt="defbonus" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>DefenceBonus je schopnosť viery pri ktorej si uživateľ
                                        <p2>zvýši odolnosť
                                            <div class="slam">
                                                <div class="skryteOkno2">
                                                    <p>Zvýši odolnosť voči útokom <br> (60% viery)</p>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
                    <li>
                        <div class="fire">
                                <button onclick="dajAttakeBonus()" style="padding: 0; background: none ;border: none;"><img src="../img/AttakeBonus60.png" alt="attakebonus" /></button>
                                <div class="skryteOkno schoSkry">
                                    <p1>AttakeBonus je schopnosť viery pri ktorej si uživateľ
                                        <p2>zvýši silu
                                            <div class="fir">
                                                <div class="skryteOkno2">
                                                    <p3>Zvýši útok uživateľa <br> (50% viery)</p3>
                                                </div>
                                            </div>
                                        </p2>
                                    </p1>
                                </div>
                        </div>
                    </li>
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