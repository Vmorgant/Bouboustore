<?php
session_start();
include_once 'auth.php';
$Connect = mysqli_connect($Server, $login, $mdp, $db);
mysqli_set_charset($Connect, "UTF8");
if (!$Connect)
    echo "Connexion à la base impossible";
date_default_timezone_set('Europe/Paris');
?>
