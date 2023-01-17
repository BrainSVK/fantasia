<?php

use model\img\img;
use model\postava\postava;
require_once "../model/img.php";
require_once '../model/postava.php';

if (!empty($_SESSION["id"])) {
    if (isset($_POST["submit"])) {
        if (!empty($_FILES["image"]["name"])) {
            // Get file info
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            if (file_exists("../img-hracov/" . $fileName)) {
                $cislo = random_int(0,9);
                $fileName = $cislo . $fileName;
            }
            $folder = "../img-hracov/" . $fileName;

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                // Insert image content into database
                //$insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())");
                $img = new img($_SESSION["id"]);
                if ($img->skontrolujCiNiejePrazdny()) {
                    header("Location: profil?chyba=uzivatel_uz_ma_obrazok");
                } else {
                    $img->vlozImg($folder);
                    $img->uploadObrazok();
                    $postava = new postava($_SESSION["id"]);
                    $postava->setImg($folder);
                    move_uploaded_file($image, $folder);
                    header("Location: profil?chyba=ziadna");
                }
            } else {
                header("Location: profil?chyba=obrazok_ma_koncovku_JPG_JEPG_PNG_GIF");
            }
        }
    }
    if (isset($_POST["submitVymaz"])) {
        $img = new img($_SESSION["id"]);
        $postava = new postava($_SESSION["id"]);
        unlink($postava->getImg());
        $postava->setImg("../img-hracov/fiary1.png");
        $img->removeObrazok();
        header("Location: profil?chyba=ziadna");
    }
}

if (isset($_GET["chyba"])) {
    if ($_GET["chyba"] == "uzivatel_uz_ma_obrazok") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Už ste si uploudovali svoj obrazok</p> </div>";
    }
    if ($_GET["chyba"] == "obrazok_ma_koncovku_JPG_JEPG_PNG_GIF") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Iné typy ako JPG, JEPG, PNG a GIF sa nevkladajú</p> </div>";
    }
    if ($_GET["chyba"] == "nezvoleny_obrazok") {
        $_GET["chyba"] = 1;
        echo "<div id='okienko'> <p>Nezzvolili ste žiaden obrázok</p> </div>";
    }
}
