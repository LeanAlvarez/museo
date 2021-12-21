<?php
    $mysqli = new mysqli("localhost", "root", "", "museo");
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
    }
    $mysqli->set_charset("utf8");
    return $mysqli;
?>