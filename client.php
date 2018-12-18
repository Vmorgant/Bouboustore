<?php
	include_once 'connect.php';
	$Nom=$_POST['nom'];
	$Prenom=$_POST['prenom'];
	$Mail=$_POST['mail'];
	$Telephone = $_POST['telephone'];
    $DateDebut=$_POST['dateDebut'];
    $DateFin=$_POST['dateFin'];
    if(isset($_POST['langue']) )
        $Langue= $_POST['langue'];
    else
        $Langue=NULL;
    if(isset($_POST['numCB']) )
        $NumCB=$_POST['numCB'];
    else
        $NumCB=NULL;
	$QueryAjout = "INSERT INTO `client`(`nom`, `prenom`, `mail`, `telephone`, `langue`, `date_debut_contrat`, `date_fin_contrat`, `	numero_cb`) VALUES ('".$Nom."',".$Prenom.",".$Mail.",'".$Telephone."','".$Langue."','".$DateDebut."','".$DateFin."','".$NumCB."')";
	$Result= $Connect->query($QueryAjout);

    $QueryCategorie = "SELECT DISTINCT nom FROM `categorieProduit`";
                                    $Categorie= $Connect->query($QueryCategorie);
                                    $present=0;
                                    while ($Data = mysqli_fetch_array($Categorie) ){
                                        $i=0;
                                        if($Data[$i] == $Categorie){
                                            $present=1;
                                        }
                                        $i++;
                                    }
                                    if($present==0){
                                        $QueryAjout = "INSERT INTO `categorieProduit`(`nom`) VALUES ('".$Categorie."')";
                                        $Result= $Connect->query($QueryAjout);
                                    }
	header("location:ajoutProduit.php");
?>