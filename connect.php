<?php
session_start();
include_once 'auth.php';
$Connect = mysqli_connect($Server, $login, $mdp, $db);
$mysqli->set_charset("utf8");
if (!$Connect)
    echo "Connexion à la base impossible";
date_default_timezone_set('Europe/Paris');
?>
