<?php
	include_once 'connect.php';
	$Nom=$_POST['nom'];
	$Prenom=$_POST['prenom'];
	$Mail=$_POST['email'];
	$Telephone = $_POST['tel'];
    $DateDebut=$_POST['dateDebut'];
    $DateFin=$_POST['dateFin'];
    if(isset($_POST['langue']) ){
        $Langue= $_POST['langue'];
	}
    else{
        $Langue=NULL;
	}
    if(isset($_POST['numCB']) ){
        $NumCB=$_POST['numCB'];
	}
    else{
        $NumCB=NULL;
	}
	$Query = "INSERT INTO `client`(`nom`, `prenom`, `mail`, `telephone`, `langue`, `date_debut_contrat`, `date_fin_contrat`, `numero_cb`) VALUES ('".$Nom."','".$Prenom."','".$Mail."','".$Telephone."','".$Langue."','".$DateDebut."','".$DateFin."','".$NumCB."')";
	$Result= $Connect->query($Query);
?>