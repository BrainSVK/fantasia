<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    /** @var TYPE_NAME $conn */
    $result = mysqli_query($conn, "SELECT * FROM gm_player WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $result2 = mysqli_query($conn,"SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    $row2 = mysqli_fetch_assoc($result2);
} else {
    header("Location: login.php");
}

//function plusFyzickaSila() : void {
//    /** @var TYPE_NAME $conn */
//    $result2 = mysqli_query($conn,"SELECT * FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
//    $row2 = mysqli_fetch_assoc($result2);
//    if ($row2["volnestaty"] > 0) {
//        /** @var TYPE_NAME $conn */
//        mysqli_query($conn, "UPDATE gm_postava Set fyzickaSila = fyzickaSila + 1 , volneStaty = volneStaty - 1 WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
//    }
//
//}

