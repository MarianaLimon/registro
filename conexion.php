<?php

    $mysqli = new mysqli("localhost", "xtremepower", "mdmM4rketing", "xtremepromo");
    $acentos = $mysqli->query("SET NAMES 'utf8'");

    if(mysqli_connect_errno()){
        echo "Conexion Fracasada: ", mysqli_connect_error();
        exit();
    }

?>