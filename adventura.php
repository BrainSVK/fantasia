<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($conn,"SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player WHERE id = $id)");
    $row2 = mysqli_fetch_assoc($result2);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="skript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
  <ul class="navigation">
    <li>
      <h1>Schopnosti</h1>
      <a href="schopnosti.php"><img src="img/schopnosti.png" alt="schopnosti obrazok"></a>
    </li>
    <li>
      <h1>Postava</h1>
      <a href="index.php"><img src="img/postava.png" alt="postava obrazok"></a>
    </li>
    <li>
      <h1>Adventura</h1>
      <a href="adventura.php"><img src="img/mapa.png" alt="adventura obrazok"></a>
    </li>
  </ul>
</header>
<div class="stredny"></div>
    <div id="oknoBoj">
        <div id="obrazok"></div>
<!--        <progress id="health" value="--><?php //echo $row2['vitalita'] ?><!--" max="--><?php //echo $row2['vitalita'] ?><!--"></progress>-->
        <progress id="health"></progress>
        <p id="p1">100/100</p>
        <div id="obrazokNepriatel"></div>
        <progress id="healthNepriatel"></progress>
        <p id="p2">100/100</p>
            <div id="pata">
                <div id="pouzivaneSchopnosti">
                    <?php
                    if ($row2['id_fyz'] == 1) {
                        ?>
                        <img onclick="flyingkick(this.src)" src="img/FlyingKick60.png" alt="schopnost flyingkick">
                        <?php
                    } elseif ($row2['id_fyz'] == 2) {
                        ?>
                        <img src="img/BodySlam60.png" alt="schopnost bodyslam">
                        <?php
                    } else {
                        ?>
                        <img src="img/PunchGataling60.png" alt="schopnost punchinggataling">
                        <?php
                    }
                    ?>

                    <?php
                    if ($row2['id_mag'] == 1) {
                        ?>
                        <img src="img/fireBall60.png" alt="schopnost fireball">
                        <?php
                    } elseif ($row2['id_mag'] == 2) {
                        ?>
                        <img src="img/frostNova60.png" alt="schopnost frostnova">
                        <?php
                    } else {
                        ?>
                        <img src="img/windSlash60.png" alt="schopnost windslash">
                        <?php
                    }
                    ?>

                    <?php
                    if ($row2['id_vie'] == 1) {
                        ?>
                        <img src="img/heal60.png" alt="schopnost heal">
                        <?php
                    } elseif ($row2['id_vie'] == 2) {
                        ?>
                        <img src="img/defBonus60.png" alt="schopnost defbonus">
                        <?php
                    } else {
                        ?>
                        <img src="img/AttakeBonus60.png" alt="schopnost attakebonus">
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="stredny">
    <div id="priehladny"></div>
    <div class="obrazok"></div>
    <div class="statySchopnosti">
        <h1>SCHOPNOSTI</h1>
        <div class="pouzivaneSchopnosti">
            <?php
            if ($row2['id_fyz'] == 1) {
                ?>
                <img src="img/FlyingKick60.png" alt="schopnost flyingkick" style="min-width: 60px">
                <?php
            } elseif ($row2['id_fyz'] == 2) {
                ?>
                <img src="img/BodySlam60.png" alt="schopnost bodyslam" style="min-width: 60px">
                <?php
            } else {
                ?>
                <img src="img/PunchGataling60.png" alt="schopnost punchinggataling" style="min-width: 60px">
                <?php
            }
            ?>

            <?php
            if ($row2['id_mag'] == 1) {
                ?>
                <img src="img/fireBall60.png" alt="schopnost fireball" style="min-width: 60px">
                <?php
            } elseif ($row2['id_mag'] == 2) {
                ?>
                <img src="img/frostNova60.png" alt="schopnost frostnova" style="min-width: 60px">
                <?php
            } else {
                ?>
                <img src="img/windSlash60.png" alt="schopnost windslash" style="min-width: 60px">
                <?php
            }
            ?>

            <?php
            if ($row2['id_vie'] == 1) {
                ?>
                <img src="img/heal60.png" alt="schopnost heal" style="min-width: 60px">
                <?php
            } elseif ($row2['id_vie'] == 2) {
                ?>
                <img src="img/defBonus60.png" alt="schopnost defbonus" style="min-width: 60px">
                <?php
            } else {
                ?>
                <img src="img/AttakeBonus60.png" alt="schopnost attakebonus" style="min-width: 60px">
                <?php
            }
            ?>
        </div>
    </div>
    <div class="statySchopnosti">
        <h1>SCHOPNOSTI</h1>
        <div class="pouzivaneSchopnosti"></div>
    </div>
  <div class="statyAdventura">
    <h1>ADVENTURA</h1>
    <div class="scrollmenu scrollmenu2">
        <img src="img/adventura800.png" alt="schopnost heal" usemap="#workmap">
        <map name="workmap">
            <area shape="rect" coords="208,54,241,83" onclick="spusti(1, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="103,119,134,151" onclick="spusti(2, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="263,135,297,164" onclick="spusti(3, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="189,230,222,260" onclick="spusti(4, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="118,300,150,330" onclick="spusti(5, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="287,358,318,387" onclick="spusti(6, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="87,403,120,433" onclick="spusti(7, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="161,477,193,507" onclick="spusti(8, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="412,88,444,117" onclick="spusti(9, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="514,216,546,246" onclick="spusti(10, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="608,51,641,82" onclick="spusti(11, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="612,219,645,247" onclick="spusti(12, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="621,315,651,344" onclick="spusti(13, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="419,357,450,482" onclick="spusti(14, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="513,462,539,490" onclick="spusti(15, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
            <area shape="rect" coords="665,376,696,406" onclick="spusti(16, <?php echo $row2['fyzickaSila']; ?> , <?php echo $row2['magickaSila']; ?> , <?php echo $row2['viera']; ?> , <?php echo $row2['stamina']; ?> , <?php echo $row2['vitalita']; ?> , <?php echo $row2['stastie']; ?> )">
        </map>
<!--        <form method="post">-->
<!--            <img src="img/adventura800.png" alt="schopnost heal">-->
<!--            <button type="submit" name="attakebonus" class="prvy">1</button>-->
<!--            <button type="submit" name="attakebonus" class="prvy">1</button>-->
<!--            <button type="submit" name="attakebonus" id="prvy">1</button>-->
<!--        </form>-->
    </div>
  </div>
</div>
<form class="" action="" method="post">
    <div class="odhlasit"><a href="logout.php">Odhlásiť</a></div>
</form>
<form class="" action="" method="post">
    <div class="vymazaťProfil"><a href="vymaz.php">Vymazať uživateľa</a></div>
</form>
</body>
</html>