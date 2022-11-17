<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    /** @var TYPE_NAME $conn */
    mysqli_query($conn, "DELETE FROM gm_postava WHERE gm_postava.id = (SELECT id_postavy FROM gm_player where id = $id)");
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
}
