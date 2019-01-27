<?php
session_start();
include_once 'auth.php';
$Connect = mysqli_connect($Server, $login, $mdp, $db);
if (!$Connect)
    echo "Connexion à la base impossible";
date_default_timezone_set('Europe/Paris');
?>