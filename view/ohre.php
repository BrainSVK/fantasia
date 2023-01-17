<?php
require_once "../DBaccess/config.php";
require_once "../control/locate/zamkniBoj.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="../skript/skript2.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav>
    <ul id='nav-bar'>
        <input type='checkbox' id='check' />
        <div class="menu">
                    <li><a href="ohre">O hre</a></li>
                    <li><a href="profil">Profil</a></li>
                    <li><a href="../control/auth/logout">Odhlasiť sa</a></li>
                    <li><a href="../control/auth/vymaz">Vymazať účet</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-bars"></i></label>
                </div>
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
            <h>O hre</h>
        </div>
        <p>Hra spočíva v tom ,že hráč si vylepšuje svoju postavu aby sa stal čo najsilnejším. Hráč si môže vylepšiť postavu za porazenie nepriateľa na adventúre.</p>
        <div class="napisNaStred">
            <h>Adventúra</h>
        </div>
        <p>V adventúre si môže hráč vybrať zo 4 lokácii (snežnej, púštnej, lesnej a ohnivej) v každej lokácii sú iný protivníci a 4 úrovne náročnosti. V snežnej sú najslabši, púštnej sú silnejši, lesnej sú zase o niečo silnejši a v ohnivej sú najsilnejší. Poraziť nepriateľa môžeš pomocou útokov. Ak porazíš nepriateľa získaš staty (body) na vylepšenie postavy podľa úrovne nepriateľa ,ale ak budeš ty porazený tak sa ti resetujú všetky staty a budeš musieť začať od znovu.</p>
        <div class="napisNaStred">
            <h>Postava</h>
        </div>
        <p>Každá postava má 6 statov, ktoré si môže vylepšiť. Staty určujú silu, obranu, životy a šancu kritických úderov.</p>
        <h1>Fyzická sila</h1>
        <p>určuje silu fyzických útokov</p>
        <h2>Magická sila</h2>
        <p>určuje silu magických útokov</p>
        <h3>Viera</h3>
        <p>určuje silu viery</p>
        <h4>Stamina</h4>
        <p>určuje obranu pred magickými útokmi (nepriateľ útoči na 75% magickými útokmi)</p>
        <h5>Vitalita</h5>
        <p>určuje zdravie postavy (desaťnásobok) a obranu pred fyzickými útokmi (nepriateľ útoči na 25% fyzickými útokmi)</p>
        <h6>Šťastie</h6>
        <p>určuje šancu kritického úderu (dvojnásobok) 1 bod statu = 1% šance</p>
        <div class="napisNaStred">
            <h>Schopnosti</h>
        </div>
        <p>Útotočiť na nepriateľa, oživiť si životy a očarovať si obranu alebo útok počas adventúry môžeš pomocou schopností. Fyzická schopnost sa vykonovása súčastne s protivníkovým útokom. Magická schopnosť sa vykoná skôr než protivníkov útok (pasivná schopnosť magického útoku sa vykoná na konci kola). Schopnosť viery sa vykoná skôr než protivník zaútoči. </p>
        <p>Fyzické schopnosti:</p>
        <h7>FlyingKick</h7>
        <p>je fyzická schopnosť ,ktorá spôsobuje 100% sily fyzického útoku a vytvára kombinácie útokov (50% šanca na vykonanie ďalšej schopnosti)</p>
        <h3>BodySlam</h3>
        <p>je fyzická schopnosť ,ktorá spôsobuje 150% sily fyzického útoku a omráči nepriateľa (20% šanca na omráčenie nepriateľa, omráčený nepriateľ nemôže zaútočiť dané kolo) </p>
        <h4>PunchGataling</h4>
        <p>je fyzická schopnosť ,ktorá spôsobuje 40% sily fyzického útoku každou ranou do nepriateľa (80% šanca na trafenie ďalšej rany)</p>
        <p>Magické schopnosti:</p>
        <h1>FireBall</h1>
        <p>je magická schopnosť ,ktorá spôsobuje 120% sily magického útoku a spôsobuje zapálenie protivníka (60% šanca na zapálenie protivníka, spôsobuje navyše 10% maximálneho života protivníka na konci kola)</p>
        <h2>FrostNova</h2>
        <p>je magická schopnosť ,ktorá spôsobuje 70% sily magického útoku a spôsobuje umrznutie protivníka (80% šanca na umrznutie protivníka, spôsobuje navyše 5% maximálneho života protivníka na konci kola)</p>
        <h5>WindSlash</h5>
        <p>je magická schopnosť ,ktorá spôsobuje 100% sily magického útoku a spôsobuje krvácanie protivníka (30% šanca na krvácanie protivníka, spôsobuje navyše 20% maximálneho života protivníka na konci kola)</p>
        <p>Schopnosti viery:</p>
        <h5>Heal</h5>
        <p>je schopnosť viery ,ktorá vylieči život postavy (250% sily viery) </p>
        <h3>DefenceBonus</h3>
        <p>je schopnosť viery ,ktorá zvýši fyzickú a magickú obranu postavy (60% sily viery) </p>
        <h1>AttakeBonus</h1>
        <p>je schopnosť viery ,ktorá zvýši fyzickú a magickú silu postavy (50% sily viery) </p>
</div>
</body>
</html>
